<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\UserProfile;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startDate = $today->copy()->subDays(6); // last 7 days including today

        // Books added per day (for your existing chart)
        $booksDaily = Book::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate->startOfDay(), $today->endOfDay()])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date')
            ->toArray();

        // Books downloaded per day (sum of purchased_books counts grouped by date) for your existing chart
        $downloadsDailyRaw = UserProfile::selectRaw('DATE(created_at) as date, purchased_books')
            ->whereBetween('created_at', [$startDate->startOfDay(), $today->endOfDay()])
            ->get()
            ->groupBy('date');

        $downloadsDaily = $downloadsDailyRaw->map(function ($profiles) {
            return $profiles->sum(function ($profile) {
                $books = json_decode($profile->purchased_books ?? '[]', true);
                return is_array($books) ? count($books) : 0;
            });
        });

        // Prepare arrays for chart labels and data for weekly chart
        $dates = [];
        $booksData = [];
        $downloadsData = [];

        for ($i = 0; $i < 7; $i++) {
            $dateObj = $startDate->copy()->addDays($i);
            $date = $dateObj->format('Y-m-d');
            $dates[] = $dateObj->format('D'); // Day short name like Mon, Tue

            $booksData[] = $booksDaily[$date] ?? 0;
            $downloadsData[] = $downloadsDaily[$date] ?? 0;
        }

        // Dropdown items for card menus (can be reused)
        $dropdownItems = [
            ['label' => 'Refresh', 'url' => 'javascript:;'],
            ['label' => 'Export', 'url' => 'javascript:;'],
            ['divider' => true],
            ['label' => 'Settings', 'url' => 'javascript:;'],
        ];

        // Total books count for doughnut chart
        $totalBooks = Book::count();

        // Total downloaded books count for doughnut chart
        $totalDownloadedBooks = UserProfile::select('purchased_books')
            ->get()
            ->sum(function ($profile) {
                $books = json_decode($profile->purchased_books ?? '[]', true);
                return is_array($books) ? count($books) : 0;
            });
        $languages = ['Pashto', 'English', 'Dari'];

        // Get counts for these languages only
        $booksByLanguage = Book::selectRaw('language, COUNT(*) as count')
            ->whereIn('language', $languages)
            ->groupBy('language')
            ->pluck('count', 'language')
            ->toArray();

        // Ensure all languages are present with 0 if missing
        foreach ($languages as $lang) {
            if (!isset($booksByLanguage[$lang])) {
                $booksByLanguage[$lang] = 0;
            }
        }

        $totalUsers = User::count();

        $today = Carbon::today();
        $lastWeekUsers = User::whereBetween('created_at', [$today->copy()->subDays(14), $today->copy()->subDays(7)->endOfDay()])->count();
        $thisWeekUsers = User::whereBetween('created_at', [$today->copy()->subDays(7), $today->endOfDay()])->count();

        if ($lastWeekUsers == 0) {
            $usersPercentageChange = $thisWeekUsers > 0 ? 100 : 0;
        } else {
            $usersPercentageChange = round((($thisWeekUsers - $lastWeekUsers) / $lastWeekUsers) * 100, 2);
        }
        $totalRevenue = Book::whereNotNull('final_price')->sum('final_price');

        $today = Carbon::today();

        // New users this week (last 7 days)
        $newUsersThisWeek = User::where('created_at', '>=', $today->copy()->subDays(6))->count();

        // New users previous week (7 days before the last week)
        $newUsersLastWeek = User::whereBetween('created_at', [
            $today->copy()->subDays(13), // 13 days ago
            $today->copy()->subDays(7),  // 7 days ago
        ])->count();

        // Calculate percentage change safely
        if ($newUsersLastWeek === 0) {
            $newUsersPercentageChange = $newUsersThisWeek > 0 ? 100 : 0;
        } else {
            $newUsersPercentageChange = (($newUsersThisWeek - $newUsersLastWeek) / $newUsersLastWeek) * 100;
        }

        $newUsersPercentageChange = round($newUsersPercentageChange, 2);

        $downloadsCount = UserProfile::where('created_at', '>=', $today->copy()->subDays(6))
            ->get()
            ->sum(function ($profile) {
                $books = json_decode($profile->purchased_books ?? '[]', true);
                return is_array($books) ? count($books) : 0;
            });

        // Last week's downloaded books
        $downloadsLastWeek = UserProfile::whereBetween('created_at', [
            $today->copy()->subDays(13),
            $today->copy()->subDays(7),
        ])->get()
            ->sum(function ($profile) {
                $books = json_decode($profile->purchased_books ?? '[]', true);
                return is_array($books) ? count($books) : 0;
            });

        // Calculate percentage change safely
        if ($downloadsLastWeek === 0) {
            $downloadsPercentageChange = $downloadsCount > 0 ? 100 : 0;
        } else {
            $downloadsPercentageChange = (($downloadsCount - $downloadsLastWeek) / $downloadsLastWeek) * 100;
        }

        $recentBooks = Book::latest()->take(6)->get();
        // Return all data to the view
        return view('admin.dashboard', compact(
            'dates',
            'booksData',
            'downloadsData',
            'dropdownItems',
            'totalBooks',
            'totalDownloadedBooks',
            'booksByLanguage',
            'totalUsers',
            'usersPercentageChange',
            'totalRevenue',
            'newUsersThisWeek',
            'newUsersPercentageChange',
            'downloadsCount',
            'downloadsPercentageChange',
            'recentBooks'
        ));
    }
}
