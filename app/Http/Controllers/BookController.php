<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Post;
use App\Models\Author;

use Illuminate\Http\Request;

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


    public function home(){
        return view('welcome');
    }
}
