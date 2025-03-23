<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.brand.index');
    }

    public function getBrandsData()
    {
        $brands = Brand::get();

        return DataTables::of($brands)
            ->addColumn('action', function ($brand) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $brand->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteBrandBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $brand->id . '">Delete</a>';
            })->addColumn('brand_image', function ($brand) {
                return '<img src="' . $brand->brand_image . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['brand_image', 'action'])
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
                'brand_name' => ['required', 'string'],
            ]
        );

        $brand = new Brand();

        $brand->brand_image = $request->brand_image;
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name) . uniqid();

        // single image upload

        if ($request->hasFile('brand_image')) {
            $brand_image = $request->file('brand_image');
            $img = uniqid() . '.' . time() . '.' . $brand_image->getClientOriginalExtension();
            $brand_image->move(public_path('images/brands/'), $img);
            $brand->brand_image = 'images/brands/' . $img;
        }
        // single image upload end

        $check = $brand->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $brand], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return response()->json(['message' => 'success', 'data' => $brand], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {


        // $request->validate(
        //     [
        //         'brand_name' => 'string',
        //         'brand_slug' => 'required',
        //     ]
        // );

        $brand->brand_image = $request->brand_image;
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name) . uniqid();

        // single image upload

        if ($request->hasFile('brand_image')) {
            $brand_image = $request->file('brand_image');
            $img = uniqid() . '.' . time() . '.' . $brand_image->getClientOriginalExtension();
            $brand_image->move(public_path('images/brands/'), $img);
            $brand->brand_image = 'images/brands/' . $img;
        }
        // single image upload end

        $check = $brand->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $brand], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
