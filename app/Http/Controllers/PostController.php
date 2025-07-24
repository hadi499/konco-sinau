<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $posts = Post::with('category')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::all(); // untuk dropdown filter

        return view('posts.index', [
            'posts' => $posts,
            'search' => $search,
            'category' => $category,
            'categories' => $categories,
            'title' => 'admin posts'
        ]);
    }

    public function show($slug)
    {
        // Ambil post berdasarkan slug
        $post = Post::with('category')->where('slug', $slug)->firstOrFail();

        return view('posts.show', [
            'post' => $post,
            'title' => 'admin detail post'
        ]);
    }



    public function create()
    {
        $categories = Category::all();
        return view('posts.create', [
            'categories' => $categories,
            'title' => 'admin create post'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Upload image jika ada
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view(
            'posts.edit',
            [
                'post' => $post,
                'categories' => $categories,
                'title' => 'admin edit post'
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $validatedData['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Hapus gambar jika ada
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }

    // Index publik (daftar postingan dengan card)
    public function publicIndex(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $posts = Post::with('category')
            ->when($search, fn($q) => $q->where('title', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%"))
            ->when($category, fn($q) => $q->where('category_id', $category))
            ->latest()
            ->paginate(6)
            ->withQueryString();

        $categories = Category::all();

        return view('public.posts.index', [
            'posts' => $posts,
            'categories' => $categories,
            'title' => 'blog posts'
        ]);
    }

    // Show publik (detail postingan)
    public function publicShow($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->firstOrFail();
        return view('public.posts.show', [
            'post' => $post,
            'title' => 'detail post'
        ]);
    }
}
