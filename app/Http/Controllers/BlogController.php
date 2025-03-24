<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.blog.index');
    }

    public function getBlogsData()
    {
        $blogs = Blog::get();

        return DataTables::of($blogs)
            ->addColumn('action', function ($blog) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $blog->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteBlogBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $blog->id . '">Delete</a>';
            })->addColumn('blog_image', function ($blog) {
                return '<img src="' . asset($blog->blog_image) . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['blog_image', 'action'])
            ->make(true);
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
        $request->validate(
            [
                'blog_title' => 'string',
                'blog_short_desc' => 'string',
                'blog_long_desc' => 'string',
                'blog_date' => 'date',
            ]
        );

        $blog = new Blog();

        $blog->blog_image = $request->blog_image;
        $blog->blog_title = $request->blog_title;
        $blog->blog_short_desc = $request->blog_short_desc;
        $blog->blog_long_desc = $request->blog_long_desc;
        $blog->blog_date = $request->blog_date;

        // single image upload

        if ($request->hasFile('blog_image')) {
            $blog_image = $request->file('blog_image');
            $img = uniqid() . '.' . time() . '.' . $blog_image->getClientOriginalExtension();
            $blog_image->move(public_path('images/blogs/'), $img);
            $blog->blog_image = 'images/blogs/' . $img;
        }
        // single image upload end

        $check = $blog->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $blog], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return response()->json(['message' => 'success', 'data' => $blog], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->blog_image = $request->blog_image;
        $blog->blog_title = $request->blog_title;
        $blog->blog_short_desc = $request->blog_short_desc;
        $blog->blog_long_desc = $request->blog_long_desc;
        $blog->blog_date = $request->blog_date;

        // single image upload

        if ($request->hasFile('blog_image')) {
            $blog_image = $request->file('blog_image');
            $img = uniqid() . '.' . time() . '.' . $blog_image->getClientOriginalExtension();
            $blog_image->move(public_path('images/blogs/'), $img);
            $blog->blog_image = 'images/blogs/' . $img;
        }
        // single image upload end

        $check = $blog->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $blog], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
