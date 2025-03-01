<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.template.components.color-table');
    }

    public function getColorsData()
    {
        $colors = Color::get();

        return DataTables::of($colors)
            ->addColumn('action', function ($color) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $color->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteColorBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $color->id . '">Delete</a>';
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
                'color_name' => ['required', 'string'],
                'color_code' => 'string',
            ]
        );

        $color = new Color();

        $color->color_name = $request->color_name;
        $color->color_code = $request->color_code;
        $color->color_slug = Str::slug($request->color_name) . uniqid();

        $check = $color->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $color], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return response()->json(['message' => 'success', 'data' => $color], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $request->validate(
            [
                'color_name' => ['required', 'string'],
                'color_code' => 'string',
            ]
        );

        $color->color_name = $request->color_name;
        $color->color_code = $request->color_code;
        $color->color_slug = Str::slug($request->color_name) . uniqid();

        $check = $color->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $color], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
