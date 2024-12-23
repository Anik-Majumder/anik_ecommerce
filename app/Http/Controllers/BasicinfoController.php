<?php

namespace App\Http\Controllers;

use App\Models\Basicinfo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BasicinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.template.components.basicinfo-table');
    }

    public function getBasicinfosData()
    {
        $basicinfos = Basicinfo::get();

        return DataTables::of($basicinfos)
            ->addColumn('action', function ($basicinfo) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $basicinfo->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> 
                <a id="deleteBasicinfoBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $basicinfo->id . '">Delete</a>';
            })->addColumn('light_logo', function ($basicinfo) {
                return '<img src="' . $basicinfo->light_logo . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->addColumn('dark_logo', function ($basicinfo) {
                return '<img src="' . $basicinfo->dark_logo . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['light_logo', 'dark_logo', 'action'])
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
        // $request->validate(
        //     [
        //         'site_name' => ['string'],
        //         'short_desc' => 'string',
        //         'address' => 'string',
        //         'email' => 'string',
        //         'phone_1' => 'string',
        //         'phone_2' => 'string',
        //         'fb_link' => 'string',
        //         'insta_link' => 'string',
        //         'linkdin_link' => 'string',
        //         'youtube_link' => 'string',
        //     ]
        // );

        $basicinfo = new Basicinfo();

        $basicinfo->light_logo = $request->light_logo;
        $basicinfo->dark_logo = $request->dark_logo;
        $basicinfo->site_name = $request->site_name;
        $basicinfo->short_desc = $request->short_desc;
        $basicinfo->address = $request->address;
        $basicinfo->email = $request->email;
        $basicinfo->phone_1 = $request->phone_1;
        $basicinfo->phone_2 = $request->phone_2;
        $basicinfo->fb_link = $request->fb_link;
        $basicinfo->insta_link = $request->insta_link;
        $basicinfo->linkdin_link = $request->linkdin_link;
        $basicinfo->youtube_link = $request->youtube_link;

        // single image upload

        if ($request->hasFile('light_logo')) {
            $light_logo = $request->file('light_logo');
            $img = uniqid() . '.' . time() . '.' . $light_logo->getClientOriginalExtension();
            $light_logo->move(public_path('images/basicinfo/'), $img);
            $basicinfo->light_logo = 'images/basicinfo/' . $img;
        }
        if ($request->hasFile('dark_logo')) {
            $dark_logo = $request->file('dark_logo');
            $img = uniqid() . '.' . time() . '.' . $dark_logo->getClientOriginalExtension();
            $dark_logo->move(public_path('images/basicinfo/'), $img);
            $basicinfo->dark_logo = 'images/basicinfo/' . $img;
        }
        // single image upload end

        $check = $basicinfo->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $basicinfo], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Basicinfo $basicinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Basicinfo $basicinfo)
    {
        return response()->json(['message' => 'success', 'data' => $basicinfo], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Basicinfo $basicinfo)
    {
        $basicinfo->light_logo = $request->light_logo;
        $basicinfo->dark_logo = $request->dark_logo;
        $basicinfo->site_name = $request->site_name;
        $basicinfo->short_desc = $request->short_desc;
        $basicinfo->address = $request->address;
        $basicinfo->email = $request->email;
        $basicinfo->phone_1 = $request->phone_1;
        $basicinfo->phone_2 = $request->phone_2;
        $basicinfo->fb_link = $request->fb_link;
        $basicinfo->insta_link = $request->insta_link;
        $basicinfo->linkdin_link = $request->linkdin_link;
        $basicinfo->youtube_link = $request->youtube_link;

        // single image upload

        if ($request->hasFile('light_logo')) {
            $light_logo = $request->file('light_logo');
            $img = uniqid() . '.' . time() . '.' . $light_logo->getClientOriginalExtension();
            $light_logo->move(public_path('images/basicinfo/'), $img);
            $basicinfo->light_logo = 'images/basicinfo/' . $img;
        }
        if ($request->hasFile('dark_logo')) {
            $dark_logo = $request->file('dark_logo');
            $img = uniqid() . '.' . time() . '.' . $dark_logo->getClientOriginalExtension();
            $dark_logo->move(public_path('images/basicinfo/'), $img);
            $basicinfo->dark_logo = 'images/basicinfo/' . $img;
        }
        // single image upload end

        $check = $basicinfo->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $basicinfo], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Basicinfo $basicinfo)
    {
        $basicinfo->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
