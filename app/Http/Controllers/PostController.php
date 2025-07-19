<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //

    public function create()
    {
        return view('admin.post.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string',
            'images.*' => 'nullable|image|max:2048',
            'pdfs.*' => 'nullable|mimes:pdf|max:5120',
            'visibility' => 'required|in:public,private',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts/images', 'public');
                $imagePaths[] = $path;
            }
        }

        $pdfPaths = [];
        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $pdf) {
                $path = $pdf->store('posts/pdfs', 'public');
                $pdfPaths[] = $path;
            }
        }

        logger()->info('Images stored at:', $imagePaths);
        logger()->info('PDFs stored at:', $pdfPaths);

        $post = Post::create([
            'user_id' => auth()->id(),
            'body' => $data['body'],
            'images' => $imagePaths ? json_encode($imagePaths) : null,
            'pdfs' => $pdfPaths ? json_encode($pdfPaths) : null,
            'visibility' => $data['visibility'],
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post created!');
    }
    public function index(Request $request)
    {
        // Load first page of posts with user relation
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        if ($request->ajax()) {
            // Return JSON for AJAX calls (like pagination or search)
            return response()->json([
                'posts' => view('posts.partials.posts_grid', compact('posts'))->render(),
                'pagination' => (string) $posts->links('posts.partials.pagination')
            ]);
        }

        return view('admin.post.index', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.create', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post); // Fix: use $post, not $id

        $data = $request->validate([
            'body' => 'required|string',
            'images.*' => 'nullable|image|max:2048',
            'pdfs.*' => 'nullable|mimes:pdf|max:5120',
            'visibility' => 'required|in:public,private',
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('posts/images', 'public');
            }
            $data['images'] = json_encode($imagePaths);
        } else {
            $data['images'] = $post->images; // Keep existing if not uploaded
        }

        // Handle PDF uploads
        if ($request->hasFile('pdfs')) {
            $pdfPaths = [];
            foreach ($request->file('pdfs') as $pdf) {
                $pdfPaths[] = $pdf->store('posts/pdfs', 'public');
            }
            $data['pdfs'] = json_encode($pdfPaths);
        } else {
            $data['pdfs'] = $post->pdfs;
        }

        $post->update($data);

        return redirect()->route('admin.post.index', $post->id)->with('success', 'Post updated successfully!');
    }


    public function search(Request $request)
    {
        $query = $request->input('query', '');

        $posts = Post::with('user')
            ->where(function ($q) use ($query) {
                $q->where('body', 'like', "%$query%")
                    ->orWhereHas('user', function ($q2) use ($query) {
                        $q2->where('name', 'like', "%$query%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return response()->json([
            'posts' => view('admin.post.partials.posts-grid', compact('posts'))->render(),
            'pagination' => (string) $posts->links('admin.post.partials.pagination'),
        ]);
    }




    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        // Delete images and PDFs from storage
        if ($post->images) {
            foreach (json_decode($post->images, true) as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        if ($post->pdfs) {
            foreach (json_decode($post->pdfs, true) as $pdf) {
                Storage::disk('public')->delete($pdf);
            }
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}
