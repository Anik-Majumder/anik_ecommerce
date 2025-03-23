<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.categories.index');
    }

    public function getCategoriesData()
    {
        $categories = Category::get();

        return DataTables::of($categories)
            ->addColumn('action', function ($category) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $category->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteCategoryBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $category->id . '">Delete</a>';
            })->addColumn('category_image', function ($category) {
                return '<img src="' . $category->category_image . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['category_image', 'action'])
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
                'category_name' => ['required', 'string'],
            ]
        );

        $category = new Category();

        $category->category_image = $request->category_image;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name) . uniqid();

        // single image upload

        if ($request->hasFile('category_image')) {
            $category_image = $request->file('category_image');
            $img = uniqid() . '.' . time() . '.' . $category_image->getClientOriginalExtension();
            $category_image->move(public_path('images/categories/'), $img);
            $category->category_image = 'images/categories/' . $img;
        }
        // single image upload end

        $check = $category->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $category], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return response()->json(['message' => 'success', 'data' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->category_image = $request->category_image;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name) . uniqid();

        // single image upload

        if ($request->hasFile('category_image')) {
            $category_image = $request->file('category_image');
            $img = uniqid() . '.' . time() . '.' . $category_image->getClientOriginalExtension();
            $category_image->move(public_path('images/categories/'), $img);
            $category->category_image = 'images/categories/' . $img;
        }
        // single image upload end

        $check = $category->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $category], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
