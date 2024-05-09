<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $blogs = Blog::all();

        return view('admin.Blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog_images'), $imageName);
        } else {
            $imageName = null;
        }

        $blog=new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->image = $imageName;
        $blog->facebook_url = $request->input('facebook_url');
        $blog->instagram_url = $request->input('instagram_url');
        $blog->linkedin_url = $request->input('linkedin_url');
        $blog->twitter_url = $request->input('twitter_url');
        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Created successfully.');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $blogs=Blog::all();
        $blog = Blog::findOrFail($id);
        return view('user.blogdetail', ['blog' => $blog,'blogs' => $blogs]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

        ]);
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('blog_images'), $imageName);
            $blog->image = $imageName;
        }
        $blog->facebook_url = $request->facebook_url;
        $blog->instagram_url = $request->instagram_url;
        $blog->linkedin_url = $request->linkedin_url;
        $blog->twitter_url = $request->twitter_url;

        $blog->save();
        return redirect()->route('admin.blogs.edit', compact('blog'))->with('success', 'Blog post updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.blogs.index',['blog' => $blog])->with('success', 'Product deleted successfully.');
    }
}
