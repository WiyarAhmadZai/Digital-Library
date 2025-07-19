<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\Author;
use App\Models\User;
use App\Models\Post;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



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
    public function showProfile($id)
    {
        $user = User::with('userProfile')->findOrFail($id);
        return view('frontend.profile-show', compact('user'));
    }

    // Handle update
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'profession' => 'nullable|string|max:255',
            'biography' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update user base data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $profile = $user->userProfile ?? new UserProfile();
        $profile->user_id = $user->id;
        $profile->last_name = $request->input('last_name');
        $profile->phone_number = $request->input('phone_number');
        $profile->profession = $request->input('profession');
        $profile->biography = $request->input('biography');

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Optional: delete old profile image from storage here if exists
            $profile->profile_image = $request->file('profile_image')
                ->store('uploads/user-Profiles', 'public');
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Optional: delete old cover image from storage here if exists
            $profile->cover_image = $request->file('cover_image')
                ->store('uploads/user-Profiles', 'public');
        }

        $profile->save();

        return redirect()->route('frontend.profile.show', $user->id)
            ->with('success', 'Profile updated successfully.');
    }
    public function UserDashboardData()
    {
        $activeUsersCount = User::count(); // Count all users
        $authorsCount = Author::count();
        $booksCount = Book::count();

        $user = Auth::user();
        $downloadedBooksCount = 0;

        if ($user && $user->profile) {
            $purchasedBooks = json_decode($user->profile->purchased_books ?? '[]', true);
            $downloadedBooksCount = count($purchasedBooks);
        }

        $booksByCountry = Book::select('country')
            ->selectRaw('count(*) as count')
            ->groupBy('country')
            ->pluck('count', 'country')
            ->toArray();

        // ✅ Get all admin users (assuming is_admin = true)
        $adminUserIds = User::where('is_admin', true)->pluck('id');

        // ✅ Also include a specific user named "wiyar"
        $wiyar = User::where('name', 'wiyar')->first();
        if ($wiyar && !$adminUserIds->contains($wiyar->id)) {
            $adminUserIds->push($wiyar->id);
        }

        // ✅ Get posts from all admins + "wiyar"
        $adminPosts = Post::whereIn('user_id', $adminUserIds->unique())->latest()->get();

        return view('user-dashboard', compact(
            'activeUsersCount',
            'authorsCount',
            'booksCount',
            'downloadedBooksCount',
            'booksByCountry',
            'adminPosts'
        ));
    }
    public function globalSearch(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            // If no query, return empty results
            return response()->json([
                'authors' => [],
                'books' => [],
                'users' => [],
                'posts' => [],
            ]);
        }

        $authors = Author::where('name', 'LIKE', "%{$query}%")
            ->take(5)->get();

        $books = Book::where('title', 'LIKE', "%{$query}%")
            ->with('author')
            ->take(5)->get();

        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->take(5)->get();

        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->take(5)->get();

        return response()->json([
            'authors' => $authors,
            'books' => $books,
            'users' => $users,
            'posts' => $posts,
        ]);
    }
}
