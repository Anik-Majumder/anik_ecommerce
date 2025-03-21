<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.admins.index');
    }

    public function getAdminData()
    {
        $admins = Admin::get();

        return DataTables::of($admins)
            ->addColumn('action', function ($admin) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $admin->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> 
                <a id="deleteAdminBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $admin->id . '">Delete</a>';
            })->addColumn('profile_img', function ($admin) {
                return '<img src="' . $admin->profile_img . '" border="0" width="40" height="40" class="img-rounded" align="center" />';
            })->rawColumns(['profile_img', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_auth.login');
    }

    public function createRegister()
    {
        return view('admin_auth.register');
    }
    public function storeRegister(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'lowercase', 'max:255'],
                'password' => ['required', 'confirmed'],
            ]
        );

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'profile_img' => $request->profile_img,
        ]);

        // event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return redirect()->intended(route('admin.dashboard'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
//        dd($request->all());
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'lowercase'],
                'password' => ['required'],
            ]
        );
        
        
         $admin = Admin::where('email', $request->email)->first();
        

        if ($admin && Auth::guard('admin')->attempt(['email' => $request->email,
                'password' => $request->password])) {
            $request->session()->regenerate();
            
            Auth::login($admin);

//            return redirect()->route('admin.dashboard');
            
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->with('error', 'Invalid email or password');
        
    }


    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return response()->json(['message' => 'success', 'data' => $admin], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate(
            [
                'name' => 'string',
                'email' => ['required', 'string', 'email', 'lowercase'],
                'phone' => 'string',
                'password' => ['required'],
            ]
        );

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = $request->password;

        // single image upload

        if ($request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $img = uniqid() . '.' . time() . '.' . $profile_img->getClientOriginalExtension();
            $profile_img->move(public_path('images/admin/'), $img);
            $admin->profile_img = 'images/admin/' . $img;
        }
        // single image upload end

        $check = $admin->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $admin], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');

    }
}
