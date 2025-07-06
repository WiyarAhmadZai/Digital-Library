<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;

use Illuminate\Http\Request;

class FrondendRouteController extends Controller
{
    //
    public function home()
    {
        $books = Book::whereNotNull('discount')  // Has discount price
            ->select('*')
            ->selectRaw('(price - discount) as discount_amount')
            ->orderByDesc('discount_amount')   // Sort by biggest discount
            ->limit(8)  // top 8 books
            ->get();
        return view('frontend.home.index', compact('books'));
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
        $book = Book::with(['category', 'author'])
            ->withCount([
                'reviews as reviews_count' => fn($q) => $q->whereNotNull('rating')
            ])
            ->withAvg([
                'reviews as reviews_avg_rating' => fn($q) => $q->whereNotNull('rating')
            ], 'rating')
            ->findOrFail($id);

        return view('frontend.shop.shopDetails', compact('book'));
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
