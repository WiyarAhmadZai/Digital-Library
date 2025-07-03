<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // Handle image uploads (assumes images sent as Base64 URLs in 'image_path')
        if (!empty($validated['image_path']) && is_array($validated['image_path'])) {
            $savedImages = [];

            foreach ($validated['image_path'] as $image) {
                if (isset($image['url']) && Str::startsWith($image['url'], 'data:image')) {
                    // Extract image extension from Base64 string
                    preg_match("/^data:image\/(.*);base64,/i", $image['url'], $matches);
                    $extension = $matches[1] ?? 'png';

                    // Create unique filename
                    $filename = uniqid('book_') . '.' . $extension;

                    // Decode Base64 to binary
                    $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $image['url']);
                    $imageData = base64_decode($imageData);

                    // Save file to public/uploads/books/
                    $path = public_path('uploads/books/' . $filename);
                    file_put_contents($path, $imageData);

                    $savedImages[] = 'uploads/books/' . $filename;
                }
            }

            // Store saved image paths as JSON string (casted to array in model)
            $validated['image_path'] = json_encode($savedImages);
        } else {
            $validated['image_path'] = json_encode([]);
        }

        // Create the book record
        $book = Book::create($validated);

        // Redirect back with success message
        if ($book) {
            return redirect()->back()->with('success', 'کتاب با موفقیت ذخیره شد.');
        } else {
            return response('error', 'خطا در ثبت کتاب');
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
}
