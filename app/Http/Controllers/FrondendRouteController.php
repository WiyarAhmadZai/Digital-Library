<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\Author;

use Illuminate\Http\Request;

class FrondendRouteController extends Controller
{
    //
    public function home()
    {
        $books = Book::whereNotNull('discount')
            ->select('*')
            ->selectRaw('(price - discount) as discount_amount')
            ->orderByDesc('discount_amount')
            ->limit(8)
            ->get();

        $bestSellers = Book::withCount(['reviews'])
            ->withAvg(['reviews' => fn($q) => $q->whereNotNull('rating')], 'rating')
            ->orderByDesc('reviews_count')
            ->limit(3)
            ->get();

        $authors = Author::withCount('books')->latest()->limit(6)->get(); // Load top 6 authors

        return view('frontend.home.index', compact('books', 'bestSellers', 'authors'));
    }


    public function contact()
    {
        return view('frontend.contact.index');
    }
    public function shoplist()
    {
        return view('frontend.shop.shopList');
    }

    public function shopdetails()
    {
        return view('frontend.shop.shopDetails');
    }

    public function shopcart()
    {
        return view('frontend.shop.shopCart');
    }
    public function blog()
    {
        return view('frontend.blog.index');
    }
    public function about()
    {
        return view('frontend.about.index');
    }
    public function author()
    {
        return view('frontend.author.author');
    }
    public function error()
    {
        return view('frontend.error.index');
    }
    public function shoplistData($id)
    {
        $book = Book::with(['author', 'reviews'])
            ->withCount([
                'reviews as reviews_count' => fn($q) => $q->whereNotNull('rating')
            ])
            ->withAvg([
                'reviews as reviews_avg_rating' => fn($q) => $q->whereNotNull('rating')
            ], 'rating')
            ->findOrFail($id);

        // Parse image_paths (if it's stored as JSON)
        $images = is_array($book->image_paths) ? $book->image_paths : json_decode($book->image_paths, true) ?? [];

        $relatedBooks = Book::with('author')
            ->where('author_id', $book->author_id)
            ->where('id', '<>', $book->id)
            ->take(5)
            ->get();

        return view('frontend.shop.shopDetails', compact('book', 'relatedBooks', 'images'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);

        // You can add authorization here if needed

        $review->update([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Review updated successfully']);
        }

        return redirect()->back()->with('success', 'Review updated successfully');
    }
}
