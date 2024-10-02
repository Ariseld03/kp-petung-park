<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenericController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generics = Generic::all();
        return view('generics.index', compact('generics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|longtext',
            'status' => 'required|integer',
            'icon_picture_link' => 'string|max:255',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);

        Generic::create([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
            'status' => $request->input('status'),
            'icon_picture_link' => $request->input('icon_picture_link'),
            'staff_email' => $request->input('staff_email'),
        ]);

        return redirect()->route('generics.index')->with('success', 'Generic created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Generic $generic)
    {
        return view('generics.show', compact('generic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generic $generic)
    {
        return view('generics.edit', compact('generic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Generic $generic)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|longtext',
            'status' => 'required|integer',
            'icon_picture_link' => 'string|max:255',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);
        $generic->key = $request->input('key');
        $generic->value = $request->input('value');
        $generic->icon_picture_link = $request->input('icon_picture_link');
        $generic->staff_email = $request->input('staff_email');
        $generic->status = $request->input('status');
        $generic->save();

        return redirect()->route('generics.index')->with('success', 'Generic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generic $generic)
    {
        $generic->delete();

        return redirect()->route('generics.index')->with('success', 'Generic deleted successfully.');
    }
}

