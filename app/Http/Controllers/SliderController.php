<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.template.components.slider-table');
    }

    public function getSlidersData()
    {
        $sliders = Slider::get();

        return DataTables::of($sliders)
            ->addColumn('action', function ($slider) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $slider->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> 
                <a id="deleteSliderBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $slider->id . '">Delete</a>';
            })->addColumn('slider_img', function ($slider) {
                return '<img src="' . $slider->slider_img . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['slider_img', 'action'])
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
        $slider = new Slider();

        $slider->slider_img = $request->slider_img;
        $slider->slider_title_1 = $request->slider_title_1;
        $slider->slider_title_2 = $request->slider_title_2;
        $slider->slider_slug = Str::slug($request->slider_title_2) . uniqid();
        $slider->slider_btn_text = $request->slider_btn_text;
        $slider->slider_btn_link = $request->slider_btn_link;

        // single image upload

        if ($request->hasFile('slider_img')) {
            $slider_img = $request->file('slider_img');
            $img = uniqid() . '.' . time() . '.' . $slider_img->getClientOriginalExtension();
            $slider_img->move(public_path('images/sliders/'), $img);
            $slider->slider_img = 'images/sliders/' . $img;
        }
        // single image upload end

        $check = $slider->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $slider], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return response()->json(['message' => 'success', 'data' => $slider], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->slider_img = $request->slider_img;
        $slider->slider_title_1 = $request->slider_title_1;
        $slider->slider_title_2 = $request->slider_title_2;
        $slider->slider_slug = Str::slug($request->slider_title_2) . uniqid();
        $slider->slider_btn_text = $request->slider_btn_text;
        $slider->slider_btn_link = $request->slider_btn_link;

        // single image upload

        if ($request->hasFile('slider_img')) {
            $slider_img = $request->file('slider_img');
            $img = uniqid() . '.' . time() . '.' . $slider_img->getClientOriginalExtension();
            $slider_img->move(public_path('images/sliders/'), $img);
            $slider->slider_img = 'images/sliders/' . $img;
        }
        // single image upload end

        $check = $slider->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $slider], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
