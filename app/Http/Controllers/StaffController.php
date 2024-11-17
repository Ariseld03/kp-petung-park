<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staf.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffs.create');
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
            'position' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|integer',
            'email' => 'required|email|exists:staffs,email',
        ]);

        Staff::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
            'phone_number' => $request->input('phone_number'),
            'position' => $request->input('position'),
            'gender' => $request->input('gender'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('staffs.index')->with('Berhasil', 'Staf berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = Staff::findOrFail($id);
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($email)
    {
        // Retrieve the staff using the email
        $staff = Staff::where('email', $email)->first();
        
        // Check if the staff exists
        if (!$staff) {
            return redirect()->route('staf.index')->with('error', 'Staff not found');
        }
    
        // Pass the staff data to the view
        return view('staff.edit', compact('staff'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $email)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|integer',
            'position' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|integer',
            'email' => 'required|email',
        ]);

        $staff = Staff::where('staff_email', $email)->first();

        if (!$staff) {
            return redirect()->route('staf.index')->with('Error', 'Staff not found');
        }
        
        $data = $request->only([
            'name', 'description', 'status', 'email', 'date_of_birth', 
            'phone_number', 'position', 'gender'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $staff->update($data);

        return redirect()->route('staf.index')->with('Berhasil', 'Staf berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->status = 0;
        $staff->save();

        return redirect()->route('staffs.index')->with('Berhasil', 'Staf berhasil dihapus!');
    }
}
