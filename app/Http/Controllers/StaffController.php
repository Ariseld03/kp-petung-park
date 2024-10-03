<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|integer',
            'role' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|integer',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);

        Generic::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'staff_email' => $request->input('staff_email'),
        ]);

        return redirect()->route('generics.index')->with('success', 'Generic created successfully.');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
