<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.user.index');
    }

    public function getUsersData()
    {
        $users = User::get();

        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $user->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteUserBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $user->id . '">Delete</a>';
            })->addColumn('profile_img', function ($user) {
                return '<img src="' . $user->profile_img . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['profile_img', 'action'])
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
                'name' => 'string',
                'email' => ['required', 'string', 'email', 'lowercase'],
                'phone' => 'string',
                'password' => ['required'],
                'address' => ['string'],
            ]
        );

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->address = $request->address;

        // single image upload

        if ($request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $img = uniqid() . '.' . time() . '.' . $profile_img->getClientOriginalExtension();
            $profile_img->move(public_path('images/user/'), $img);
            $user->profile_img = 'images/user/' . $img;
        }
        // single image upload end

        $check = $user->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $user], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);


    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return response()->json(['message' => 'success', 'data' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // $request->validate(
        //     [
        //         'name' => 'string',
        //         'email' => ['required', 'string', 'email', 'lowercase'],
        //         'address' => ['string'],
        //     ]
        // );
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // single image upload

        if ($request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $img = uniqid() . '.' . time() . '.' . $profile_img->getClientOriginalExtension();
            $profile_img->move(public_path('images/user/'), $img);
            $user->profile_img = 'images/user/' . $img;
        }
        // single image upload end

        $check = $user->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $user], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }

}
