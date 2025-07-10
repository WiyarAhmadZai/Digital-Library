<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;


class AuthorController extends Controller
{
    //

    public function create()
    {
        return view('admin.authors.create');
    }
    public function index()
    {
        return view('admin.authors.list');
    }

    public function store(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'required|string',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'website' => 'nullable|url',
            'image_path' => 'required',  // At least one image must be uploaded
            'image_path.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each file
        ]);

        // Store image paths
        $imagePaths = [];

        // Check and store each uploaded image
        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $file) {
                $imagePaths[] = $file->store('uploads/authors', 'public');
            }
        }

        // Save the image paths as JSON in the database
        $validated['image_paths'] = json_encode($imagePaths);

        // Remove the original input name since it's not a DB column
        unset($validated['image_path']);

        // Create the author record
        Author::create($validated);

        // Redirect to index with success message
        return redirect()->route('admin.author.index')->with('success', 'Author created successfully!');
    }




    public function listData(Request $request)
    {
        $authors = Author::query()->orderByDesc('created_at');

        return DataTables::of($authors)
            ->addIndexColumn()

            ->addColumn('full_name', fn($author) => $author->name . ' ' . $author->last_name)

            ->addColumn('biography', fn($author) => str()->limit(strip_tags($author->biography), 50))

            ->addColumn('email', fn($author) => e($author->email))
            ->addColumn('country', fn($author) => e($author->country))
            ->addColumn('image', function ($author) {
                $images = json_decode($author->image_paths, true);
                $defaultUrl = asset('assets/img/avatars/avatar-1.png'); // default avatar

                if (!empty($images) && is_array($images)) {
                    $firstImage = $images[0];

                    // Use Storage facade to get the correct URL
                    if (Storage::disk('public')->exists($firstImage)) {
                        $url = Storage::url($firstImage);
                    } else {
                        // If file not in storage disk, try as relative asset
                        $url = asset($firstImage);
                    }
                } else {
                    $url = $defaultUrl;
                }

                return '<img src="' . e($url) . '" class="img-thumbnail" style="width:60px;height:50px;object-fit:cover;" />';
            })


            ->addColumn('action', function ($author) {
                $edit = '<a href="' . route('admin.author.edit', $author->id) . '" class="btn btn-primary btn-sm px-2 py-1 me-1"><i class="bi bi-pencil"></i></a>';
                $delete = '<button class="btn btn-danger btn-sm px-2 py-1 delete-btn" data-id="' . $author->id . '"><i class="bi bi-trash"></i></button>';
                $view = '<a href="' . route('admin.author.view', $author->id) . '" class="btn btn-info btn-sm px-2 py-1"><i class="bi bi-eye"></i></a>';
                return '<div class="d-inline-flex align-items-center gap-1">' . $edit . $delete . $view . '</div>';
            })

            ->filter(function ($query) use ($request) {
                if ($search = $request->input('search.value')) {
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('country', 'like', "%{$search}%");
                    });
                }
            })

            ->rawColumns(['image', 'action'])
            ->make(true);
    }





    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(['status' => 'success']);
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('admin.authors.create', compact('author'));
    }
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'required|string',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $author->id,
            'website' => 'nullable|url',
            'image_path' => 'nullable|array',
            'image_path.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Decode existing image paths or initialize empty array
        $imagePaths = json_decode($author->image_paths, true) ?: [];

        if ($request->hasFile('image_path')) {
            // Delete old images from storage
            foreach ($imagePaths as $oldImage) {
                if (\Storage::disk('public')->exists($oldImage)) {
                    \Storage::disk('public')->delete($oldImage);
                }
            }

            // Store new images and collect their paths
            $imagePaths = [];
            foreach ($request->file('image_path') as $file) {
                $imagePaths[] = $file->store('authors/images', 'public');
            }
        }

        // Update image_paths with JSON-encoded array
        $validated['image_paths'] = json_encode($imagePaths);

        // Update the author record
        $author->update($validated);

        return redirect()->route('admin.author.index')
            ->with('success', 'Author updated successfully!');
    }




    public function authorView($id)
    {
        $author = Author::findOrFail($id);

        $images = json_decode($author->image_paths, true) ?? [];

        $profileImage = $images[0] ?? null;
        $coverImage = $images[1] ?? null;

        return view('admin.authors.view', compact('author', 'profileImage', 'coverImage'));
    }
}
