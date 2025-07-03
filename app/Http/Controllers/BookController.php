<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;




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

        // Handle image uploads from real files (input name 'image_path[]')
        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $file) {
                if ($file->isValid()) {
                    // Generate unique filename with original extension
                    $filename = uniqid('book_') . '.' . $file->getClientOriginalExtension();

                    // Move the file to public/uploads/books directory
                    $file->move(public_path('uploads/books'), $filename);

                    // Save relative path
                    $savedImages[] = 'uploads/books/' . $filename;
                }
            }
        }

        // Store saved image paths as JSON string
        $validated['image_path'] = json_encode($savedImages);

        // Create the book record with all data including images
        $book = Book::create($validated);

        // Redirect back with success message or error
        if ($book) {
            return redirect()->route('admin.book.list')->with('success', 'کتاب با موفقیت ذخیره شد.');
        } else {
            return response('error', 'خطا در ثبت کتاب', 500);
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
        $authors = Author::all();
        return view('admin.books.create', compact('authors'));
    }

    public function bookList()
    {
        return view('admin.books.list');
    }


    public function getBooksData(Request $request)
    {
        // Load books with author relation for searching and displaying author name
        $books = Book::with('author')->orderBy('created_at', 'desc');

        return DataTables::of($books)
            ->addIndexColumn()
            ->addColumn('product', fn($book) => $book->name)
            ->addColumn('author', fn($book) => $book->author?->name ?? '—') // Add author column here
            ->addColumn('photo', function ($book) {
                $url = $book->image_path
                    ? asset('uploads/books/' . $book->image_path)
                    : asset('assets/img/avatars/avatar-1.png');
                return '<img src="' . $url . '" style="width: 50px; height: 50px; object-fit: cover;">';
            })
            ->addColumn('product_id', fn($book) => '#' . $book->id)
            ->addColumn('status', function ($book) {
                return '<span class="badge bg-success">Paid</span>';
            })
            ->addColumn('amount', fn($book) => '$' . number_format($book->price ?? 0, 2))
            ->addColumn('date', fn($book) => $book->created_at?->format('d M Y') ?? '')
            ->addColumn('shipping', function () {
                return '<div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                        </div>';
            })
            ->addColumn('action', function ($book) {
                $editUrl = route('books.edit', $book->id);
                $deleteUrl = route('books.destroy', $book->id);
                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1">Edit</a>
                    <button data-url="' . $deleteUrl . '" class="btn btn-sm btn-danger delete-btn">Delete</button>';
            })
            ->filter(function ($query) use ($request) {
                if ($search = $request->get('search')['value']) {
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
}
