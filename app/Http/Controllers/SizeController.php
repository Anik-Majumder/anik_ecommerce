<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.template.components.size-table');
    }

    public function getSizesData()
    {
        $sizes = Size::get();

        return DataTables::of($sizes)
            ->addColumn('action', function ($size) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $size->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteSizeBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $size->id . '">Delete</a>';
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
                'size_name' => ['required', 'string'],
            ]
        );

        $size = new Size();

        $size->size_name = $request->size_name;
        $size->size_slug = Str::slug($request->size_name) . uniqid();

        $check = $size->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $size], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return response()->json(['message' => 'success', 'data' => $size], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $size->size_name = $request->size_name;
        $size->size_slug = Str::slug($request->size_name) . uniqid();

        $check = $size->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $size], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
