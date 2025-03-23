<?php

namespace App\Http\Controllers;

use view;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.pages.subcategory.index', compact('categories'));
    }

    public function getSubcategoriesData()
    {
        $subcategory = Subcategory::get();

        return DataTables::of($subcategory)
            ->addColumn('action', function ($subcategory) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $subcategory->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteSubcategoryBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $subcategory->id . '">Delete</a>';
            })->addColumn('subcategory_image', function ($subcategory) {
                return '<img src="' . $subcategory->subcategory_image . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['subcategory_image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'subcategory_name' => ['required', 'string'],
            ]
        );

        $subcategory = new Subcategory();

        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_image = $request->subcategory_image;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name) . uniqid();

        // single image upload

        if ($request->hasFile('subcategory_image')) {
            $subcategory_image = $request->file('subcategory_image');
            $img = uniqid() . '.' . time() . '.' . $subcategory_image->getClientOriginalExtension();
            $subcategory_image->move(public_path('images/subcategories/'), $img);
            $subcategory->subcategory_image = 'images/subcategories/' . $img;
        }
        // single image upload end

        $check = $subcategory->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $subcategory], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        return response()->json(['message' => 'success', 'data' => $subcategory], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_image = $request->subcategory_image;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name) . uniqid();

        // single image upload

        if ($request->hasFile('subcategory_image')) {
            $subcategory_image = $request->file('subcategory_image');
            $img = uniqid() . '.' . time() . '.' . $subcategory_image->getClientOriginalExtension();
            $subcategory_image->move(public_path('images/subcategories/'), $img);
            $subcategory->subcategory_image = 'images/subcategories/' . $img;
        }
        // single image upload end

        $check = $subcategory->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $subcategory], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
