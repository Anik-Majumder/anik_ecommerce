<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.banners.index');
    }

    public function getBannersData()
    {
        $banner = Banner::get();

        return DataTables::of($banner)
            ->addColumn('action', function ($banner) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $banner->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteBannerBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $banner->id . '">Delete</a>';
            })->addColumn('banner_img', function ($banner) {
                return '<img src="' . asset($banner->banner_img) . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['banner_img', 'action'])
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
        $banner = new Banner();

        $banner->banner_img = $request->banner_img;
        $banner->banner_title_1 = $request->banner_title_1;
        $banner->banner_title_2 = $request->banner_title_2;
        $banner->banner_slug = Str::slug($request->banner_slug) . uniqid();
        $banner->banner_btn_link = $request->banner_btn_link;
        $banner->banner_btn_text = $request->banner_btn_text;

        // single image upload

        if ($request->hasFile('banner_img')) {
            $banner_img = $request->file('banner_img');
            $img = uniqid() . '.' . time() . '.' . $banner_img->getClientOriginalExtension();
            $banner_img->move(public_path('images/banner/'), $img);
            $banner->banner_img = 'images/banner/' . $img;
        }

        // single image upload end

        $check = $banner->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $banner], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return response()->json(['message' => 'success', 'data' => $banner], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->banner_img = $request->banner_img;
        $banner->banner_title_1 = $request->banner_title_1;
        $banner->banner_title_2 = $request->banner_title_2;
        $banner->banner_slug = Str::slug($request->banner_slug) . uniqid();
        $banner->banner_btn_link = $request->banner_btn_link;
        $banner->banner_btn_text = $request->banner_btn_text;

        // single image upload

        if ($request->hasFile('banner_img')) {
            $banner_img = $request->file('banner_img');
            $img = uniqid() . '.' . time() . '.' . $banner_img->getClientOriginalExtension();
            $banner_img->move(public_path('images/banner/'), $img);
            $banner->banner_img = 'images/banner/' . $img;
        }

        // single image upload end

        $check = $banner->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $banner], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
