<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
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
        $colors = Color::all();
        $sizes = Size::all();
        return view('backend.pages.product.index', compact('categories','subcategories', 'brands', 'colors', 'sizes'));
    }

    public function getProductsData()
    {
        $product = Product::with(['category', 'subcategory','brand'])->get();
        return DataTables::of($product)
            ->addColumn('action', function ($product) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $product->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteProductBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $product->id . '">Delete</a>';
            })->addColumn('product_thumb', function ($product) {
                // Decode JSON to an array
//                $images = json_decode($product->product_imgs, true);
//                $firstImage = isset($images[0]) ? $images[0] : 'default.jpg'; // Fallback if empty
//                return '<img src="' . $firstImage . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
                return '<img src="' . asset($product->product_thumb) . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })
            ->addColumn('product_size', function ($product) {

                $html='';

                foreach ( json_decode($product->product_size) as $size) {

                    $html .= '<span class="badge bg-primary mx-1"> '.$size.'</span>';
                }
                return $html;

            })
            ->addColumn('product_color', function ($product) {

                $html='';

                foreach ( json_decode($product->product_color) as $color) {

                    $html .= '<span class="badge bg-primary mx-1"> '.$color.'</span>';
                }
                return $html;

            })
            ->rawColumns(['product_thumb','product_size','product_color','action'])

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
        $product->product_thumb = $request->product_thumb;
        $product->product_name = $request->product_name;
        $product->product_qty = $request->product_qty;
        $product->product_size = json_encode($request->product_size);
        $product->product_color = json_encode($request->product_color);
        $product->product_weight = $request->product_weight;
        $product->product_new_price = $request->product_new_price;
        $product->product_old_price = $request->product_old_price;
        $product->product_short_desc = $request->product_short_desc;
        $product->product_long_desc = $request->product_long_desc;
        $product->product_slug = Str::slug($request->product_slug) . uniqid();

        // single image upload

        if ($request->hasFile('product_thumb')) {
            $product_thumb = $request->file('product_thumb');
            $img = uniqid() . '.' . time() . '.' . $product_thumb->getClientOriginalExtension();
            $product_thumb->move(public_path('images/product/'), $img);
            $product->product_thumb = 'images/product/' . $img;
        }

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
        $product->product_size = json_decode($product->product_size, true);
        $product->product_color = json_decode($product->product_color, true);
        $product->product_imgs = json_decode($product->product_imgs, true);

        return view('frontend.pages.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->product_imgs = json_decode($product->product_imgs, true);
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
        $product->product_size = json_encode($request->product_size);
        $product->product_color = json_encode($request->product_color);
        $product->product_weight = $request->product_weight;
        $product->product_new_price = $request->product_new_price;
        $product->product_old_price = $request->product_old_price;
        $product->product_short_desc = $request->product_short_desc;
        $product->product_long_desc = $request->product_long_desc;

        // single image upload

        if ($request->hasFile('product_thumb')) {
            $product_thumb = $request->file('product_thumb');
            $img = uniqid() . '.' . time() . '.' . $product_thumb->getClientOriginalExtension();
            $product_thumb->move(public_path('images/product/'), $img);
            $product->product_thumb = 'images/product/' . $img;
        }

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
        // Check if the product has a product thumbnail image and delete it
        if ($product->product_thumb && file_exists(public_path($product->product_thumb))) {
            unlink(public_path($product->product_thumb));
        }

        // Check if the product has multiple images and delete them
        if ($product->product_imgs) {
            $product_imgs = json_decode($product->product_imgs);
            foreach ($product_imgs as $product_img) {
                if (file_exists(public_path($product_img))) {
                    unlink(public_path($product_img));
                }
            }
        }

        $product->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
