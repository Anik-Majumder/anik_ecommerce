<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.template.components.blogcomment-table');
    }

    public function getBlogcommentsData()
    {
        $blogComments = BlogComment::get();

        return DataTables::of($blogComments)
            ->addColumn('action', function ($blogComment) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $blogComment->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> 
                <a id="deleteBlogcommentBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $blogComment->id . '">Delete</a>';
            })->rawColumns(['action'])
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
                'comment_text' => 'string',
                'comment_author' => 'string',
                'comment_date' => 'date',
            ]
        );

        $blogComment = new BlogComment();

        $blogComment->blog_id = $request->blog_id;
        $blogComment->comment_text = $request->comment_text;
        $blogComment->comment_author = $request->comment_author;
        $blogComment->comment_date = $request->comment_date;


        $check = $blogComment->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $blogComment], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogComment $blogComment)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComment $blogComment)
    {
        dd($blogComment);
        return response()->json(['message' => 'success', 'data' => $blogComment], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        $blogComment->blog_id = $request->blog_id;
        $blogComment->comment_text = $request->comment_text;
        $blogComment->comment_author = $request->comment_author;
        $blogComment->comment_date = $request->comment_date;


        $check = $blogComment->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $blogComment], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComment $blogComment)
    {
        $blogComment->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
