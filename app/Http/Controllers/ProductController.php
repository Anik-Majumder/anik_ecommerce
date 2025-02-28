<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('backend.template.components.product-table', compact('categories','subcategories', 'brands'));
    }

    public function getProductsData()
    {
        $product = Product::get();

        return DataTables::of($product)
            ->addColumn('action', function ($product) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $product->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> 
                <a id="deleteProductBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $product->id . '">Delete</a>';
            })->addColumn('product_imgs', function ($product) {
                return '<img src="' . $product->product_imgs . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['product_imgs', 'action'])
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
        $product = new Product();

        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_imgs = $request->product_imgs;
        $product->product_name = $request->product_name;
        $product->product_qty = $request->product_qty;
        $product->product_size = $request->product_size;
        $product->product_weight = $request->product_weight;
        $product->product_new_price = $request->product_new_price;
        $product->product_old_price = $request->product_old_price;
        $product->product_short_desc = $request->product_short_desc;
        $product->product_long_desc = $request->product_long_desc;

        // multiple image upload

        if ($request->hasFile('product_imgs')) {

            $multipleImg = [];
            $product_imgs = $request->file('product_imgs');

            foreach ($product_imgs as $product_img) {
                $img = uniqid() . '.' . time() . '.' . $product_img->getClientOriginalExtension();
                $product_img->move(public_path('images/product/'), $img);
                $multipleImg[] = 'images/product/' . $img;
            }

            $product->product_imgs = json_encode($multipleImg);
        }

        // multiple image upload end

        $check = $product->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $product], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return response()->json(['message' => 'success', 'data' => $product], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_imgs = $request->product_imgs;
        $product->product_name = $request->product_name;
        $product->product_qty = $request->product_qty;
        $product->product_size = $request->product_size;
        $product->product_weight = $request->product_weight;
        $product->product_new_price = $request->product_new_price;
        $product->product_old_price = $request->product_old_price;
        $product->product_short_desc = $request->product_short_desc;
        $product->product_long_desc = $request->product_long_desc;

        // multiple image upload

        if ($request->hasFile('product_imgs')) {

            $multipleImg = [];
            $product_imgs = $request->file('product_imgs');

            foreach ($product_imgs as $product_img) {
                $img = uniqid() . '.' . time() . '.' . $product_img->getClientOriginalExtension();
                $product_img->move(public_path('images/product/'), $img);
                $multipleImg[] = 'images/product/' . $img;
            }

            $product->product_imgs = json_encode($multipleImg);
        }

        // multiple image upload end

        $check = $product->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $product], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
