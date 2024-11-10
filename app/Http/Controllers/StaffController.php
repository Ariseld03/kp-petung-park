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
        $staffs = Staff::all();
        return view('staffs.index', compact('staffs'));
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
            'staff_email' => 'required|email|exists:staffs,email',
        ]);

        Staff::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'staff_email' => $request->input('staff_email'),
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
    public function edit(string $id)
    {
        $staff = Staff::findOrFail($id);
        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|integer',
            'position' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|integer',
            'staff_email' => 'required|email',
        ]);

        $staff = Staff::findOrFail($id);
        $data = $request->only([
            'name', 'description', 'status', 'staff_email', 'date_of_birth', 
            'phone_number', 'position', 'gender'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $staff->update($data);

        return redirect()->route('staffs.index')->with('Berhasil', 'Staf berhasil diupdate!');
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
