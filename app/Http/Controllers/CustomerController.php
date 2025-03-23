<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.customer.index');
    }

    public function getcustomersData()
    {
        $customers = Customer::get();

        return DataTables::of($customers)
            ->addColumn('action', function ($customer) {
                return '<a  class="btn btn-sm btn-success edit-btn" data-id="' . $customer->id . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                <a id="deleteCustomerBtn" class="btn btn-sm btn-danger delete-btn" data-id="' . $customer->id . '">Delete</a>';
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
                'customer_name' => 'string',
                'customer_email' => 'string',
                'customer_address' => 'string',
                'customer_district' => 'string',
                'country' => 'string',
            ]
        );

        $customer = new Customer();

        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->customer_district = $request->customer_district;
        $customer->country = $request->country;

        $check = $customer->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $customer], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return response()->json(['message' => 'success', 'data' => $customer], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {

        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->customer_district = $request->customer_district;
        $customer->country = $request->country;

        $check = $customer->save();

        if ($check) {
            return response()->json(['message' => 'success', 'data' => $customer], 200);
        }

        return response()->json(['message' => 'failed', 'data' => ''], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'success', 'data' => ''], 200);
    }
}
