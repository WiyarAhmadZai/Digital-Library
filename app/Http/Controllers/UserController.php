<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //

    public function userList()
    {
        return view('admin.users.index');
    }

    public function userData(Request $request)
    {
        $users = User::with('profile')->select('users.*');

        return DataTables::of($users)
            ->addIndexColumn()

            // Profile Image Column
            ->addColumn('profile_image', function ($user) {
                $defaultUrl = asset('assets/img/avatars/avatar-1.png');
                $imagePath = optional($user->profile)->profile_image;

                // If imagePath is a JSON array
                if ($imagePath) {
                    $images = json_decode($imagePath, true);

                    if (is_array($images) && isset($images[0])) {
                        $url = asset('storage/uploads/user-Profiles/' . $images[0]);
                    } else {
                        $url = $defaultUrl;
                    }
                } else {
                    $url = $defaultUrl;
                }

                return '<img src="' . $url . '" width="40" height="40" class="rounded-circle"/>';
            })

            // Phone Number
            ->addColumn('phone_number', function ($user) {
                return optional($user->profile)->phone_number ?? '-';
            })

            // Profession
            ->addColumn('profession', function ($user) {
                return optional($user->profile)->profession ?? '-';
            })

            // Action
            ->addColumn('action', function ($user) {
                return '<a href="' . route('frontend.profile.show', $user->id) . '" class="btn btn-sm btn-primary">View</a>';
            })

            ->rawColumns(['profile_image', 'action'])
            ->make(true);
    }
}
