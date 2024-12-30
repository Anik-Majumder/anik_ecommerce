<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.template.components.subcategory-table');
    }

    public function getSubcategoryData()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
