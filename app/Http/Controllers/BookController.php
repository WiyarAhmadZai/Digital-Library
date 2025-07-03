<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;



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
            return redirect()->back()->with('success', 'کتاب با موفقیت ذخیره شد.');
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
        $query = Book::with('author')->select('books.*');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('product', function ($book) {
                return $book->name;
            })
            ->addColumn('photo', function ($book) {
                $url = $book->image_path ? asset('storage/' . $book->image_path) : asset('assets/images/no-image.png');
                return '<img src="' . $url . '" style="width: 50px; height: 50px; object-fit: cover;" alt="Book Image">';
            })
            ->addColumn('product_id', function ($book) {
                return '#' . $book->id;
            })
            ->addColumn('status', function ($book) {
                $color = match ($book->status) {
                    'Paid' => 'bg-success',
                    'Pending' => 'bg-warning',
                    'Failed' => 'bg-danger',
                    default => 'bg-secondary',
                };
                return '<span class="badge ' . $color . ' text-white shadow-sm w-100">' . $book->status . '</span>';
            })
            ->addColumn('amount', function ($book) {
                return '$' . number_format($book->price, 2);
            })
            ->addColumn('date', function ($book) {
                return $book->created_at->format('d M Y');
            })
            ->addColumn('shipping', function ($book) {
                // Example progress bar, adjust logic as needed
                return '
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                </div>';
            })
            ->addColumn('action', function ($book) {
                $editUrl = route('books.edit', $book->id);
                $deleteUrl = route('books.destroy', $book->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1">Edit</a>
                    <button data-url="' . $deleteUrl . '" class="btn btn-sm btn-danger delete-btn">Delete</button>
                ';
            })
            ->rawColumns(['photo', 'status', 'shipping', 'action'])
            ->make(true);
    }
}
