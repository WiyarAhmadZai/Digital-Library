<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Models\Review;



class BookController extends Controller
{
    //
    public function index()
    {
        // Paginate books and authors
        $books = Book::paginate(6);
        $posts = Post::latest()->take(5)->get(); // Fetch last 5 posts
        $authors = Author::paginate(6); // Paginate authors

        if (request()->ajax()) {
            return response()->json([
                'books' => view('welcome', compact('books'))->render(),
                'pagination_books' => (string) $books->links('pagination::bootstrap-5'),
                'pagination_authors' => (string) $authors->links('pagination::bootstrap-5'),
                'authors' => view('welcome', compact('authors'))->render(), // Partial for authors
            ]);
        }

        return view('welcome', compact('books', 'posts', 'authors'));
    }


    public function home()
    {
        return view('welcome');
    }


    public function store(StoreBookRequest $request)
    {
        // Get validated data from the request
        $validated = $request->validated();

        // Calculate final price after discount
        $discount = $validated['discount'] ?? 0;
        $price = $validated['price'];
        $finalPrice = $price - ($price * $discount / 100);
        $validated['final_price'] = $finalPrice;

        $savedImages = [];

        // Handle multiple image uploads for 'image_path[]'
        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $file) {
                if ($file->isValid()) {
                    // Store file in 'public/uploads/books' (storage/app/public/uploads/books)
                    $path = $file->store('uploads/books', 'public');
                    $savedImages[] = $path;
                }
            }
        }

        // Save images paths as JSON string in DB column 'image_paths'
        $validated['image_paths'] = json_encode($savedImages);

        // Handle PDF upload 'pdf_file'
        if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            $pdfPath = $request->file('pdf_file')->store('uploads/pdf', 'public');
            $validated['pdf_path'] = $pdfPath;
        } else {
            $validated['pdf_path'] = null;
        }

        // Remove keys that are not actual DB columns but form inputs, if any
        unset($validated['image_path']); // just in case

        // Create the book record with all data
        $book = Book::create($validated);

        // Redirect back with success message
        if ($book) {
            return redirect()->route('admin.book.list')->with('success', 'کتاب با موفقیت ذخیره شد.');
        } else {
            return response('خطا در ثبت کتاب', 500);
        }
    }

    public function formEdit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.create', compact('book', 'authors', 'categories'));
    }

    public function BookUpdate(StoreBookRequest $request, $id)
    {
        // Get validated data
        $validated = $request->validated();

        // Find the book record
        $book = Book::findOrFail($id);

        // Calculate final price after discount
        $discount = $validated['discount'] ?? 0;
        $price = $validated['price'];
        $finalPrice = $price - ($price * $discount / 100);
        $validated['final_price'] = $finalPrice;

        $savedImages = [];

        // Handle uploaded images (multiple)
        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('uploads/books', 'public');
                    $savedImages[] = $path;
                }
            }
        }

        // If new images uploaded, overwrite image_paths; else keep existing images
        if (!empty($savedImages)) {
            $validated['image_paths'] = json_encode($savedImages);
        } else {
            $validated['image_paths'] = $book->image_paths;  // keep old images JSON
        }

        // Handle PDF upload
        if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            $pdfPath = $request->file('pdf_file')->store('uploads/pdf', 'public');
            $validated['pdf_path'] = $pdfPath;
        } else {
            $validated['pdf_path'] = $book->pdf_path; // preserve existing pdf path
        }

        // Remove keys not in DB columns
        unset($validated['image_path']);

        // Update book record
        $updated = $book->update($validated);

        if ($updated) {
            return redirect()->route('admin.book.list')->with('success', 'کتاب با موفقیت ویرایش شد.');
        } else {
            return redirect()->back()->with('error', 'خطا در ویرایش کتاب');
        }
    }



    public function getDat()
    {
        $books = Book::latest()->get();
        return response()->json($books);
    }

    public function getBooks()
    {
        $books = \App\Models\Book::with('author')->latest()->take(5)->get();

        return response()->json($books);
    }
    public function getFeaturedBooks()
    {
        $books = Book::with('author')->latest()->take(10)->get();
        return response()->json($books);
    }

    public function create()
    {
        $authors = Author::all();  // make sure Author model and DB is OK
        $categories = Category::all();
        return view('admin.books.create', compact('authors', 'categories'));
    }

    public function bookList()
    {
        return view('admin.books.list');
    }




    public function getBooksData(Request $request)
    {
        $books = Book::with('author')->orderBy('created_at', 'desc');

        $search = $request->input('search.value');

        return DataTables::of($books)
            ->addIndexColumn()
            ->addColumn('name', fn($row) => $row->name ?? '')
            ->addColumn('final_price', fn($row) => $row->final_price ?? '')
            ->addColumn('author', fn($row) => optional($row->author)->name ?? '')
            ->addColumn('photo', function ($book) {
                $imagePaths = json_decode($book->image_paths, true);

                if (is_array($imagePaths) && count($imagePaths) > 0) {
                    $slidesHtml = '';
                    foreach ($imagePaths as $img) {
                        $url = filter_var($img, FILTER_VALIDATE_URL) ? $img : asset('storage/' . $img);
                        $slidesHtml .= '<div class="swiper-slide">
                            <img src="' . e($url) . '" alt="Book Image" style="width: 60px; height: 50px; object-fit: cover; border-radius: 4px; border:none; outline:none; box-shadow:none;" />
                        </div>';
                    }

                    $swiperId = 'swiper-' . $book->id;

                    return '
                    <div class="swiper-container" id="' . $swiperId . '" style="width: 60px; height: 50px; position: relative; user-select:none;">
                        <div class="swiper-wrapper">' . $slidesHtml . '</div>
                    </div>';
                } else {
                    $url = asset('assets/img/avatars/avatar-1.png');
                    return '<img src="' . e($url) . '" alt="Default Avatar" style="width: 60px; height: 50px; object-fit: cover; border-radius: 4px; border:none; outline:none; box-shadow:none;" />';
                }
            })

            ->addColumn('book_id', fn($row) => '#' . ($row->id ?? ''))
            ->addColumn('status', fn($row) => '<span class="badge bg-success">' . e($row->status) . '</span>')
            ->addColumn('amount', fn($row) => $row->currency_type . ' ' . $row->final_price)
            ->addColumn('date', fn($row) => optional($row->publish_year)->format('d M Y') ?? '')
            ->addColumn('shipping', function ($row) {
                return '<div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                        </div>';
            })
            ->addColumn('action', function ($row) {
                $editBtn = '<a href="' . route('books.edit', $row->id) . '" class="btn btn-primary btn-sm px-2 py-1 me-1">
                                <i class="bi bi-pencil"></i>
                            </a>';

                $deleteBtn = '<button class="btn btn-danger btn-sm px-2 py-1 delete-btn" data-id="' . $row->id . '">
                            <i class="bi bi-trash"></i>
                        </button>';
                $viewUrl = '<a href="' . route('admin.book.view', $row->id) . '" class="btn btn-info btn-sm px-2 py-1 ">
                        <i class="bi bi-eye"></i>
                    </a>';

                return '<div class="d-inline-flex align-items-center gap-1">' . $editBtn . $deleteBtn . $viewUrl .  '</div>';
            })
            ->filter(function ($query) use ($search) {
                if ($search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('id', 'like', "%{$search}%")
                            ->orWhereHas('author', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            });
                    });
                }
            })
            ->rawColumns(['photo', 'status', 'shipping', 'action'])
            ->make(true);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
    // app/Http/Controllers/Admin/BookController.php

    public function bookView($id)
    {
        $book = Book::with(['author', 'category', 'reviews'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->findOrFail($id);

        return view('admin.books.book-view', compact('book'));
    }

    public function reviewStore(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'comment' => 'required|string',
            'rating' => 'required_if:parent_id,null|integer|min:1|max:5',  // rating required only for top-level reviews
            'parent_id' => 'nullable|exists:reviews,id',
            'terms' => 'accepted',
        ]);

        // If it's a reply (parent_id set), rating is optional (or you can skip rating for replies)
        // You can set rating null or 0 for replies if you want

        Review::create($validated);

        return redirect()->back()->with('success', 'Your review or reply has been submitted.');
    }
}
