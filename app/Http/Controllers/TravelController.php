<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::latest()->get();
        return view('travels.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('travels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|integer',
            'description' => 'required',
            'number_love' => 'nullable|integer',
        ]);

        $travel = new Travel([
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'description' => $request->get('description'),
            'number_love' => $request->get('number_love'),
        ]);

        $travel->save();

        return redirect()->route('travels.index')->with('success', 'Travel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        return view('travels.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        return view('travels.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|integer',
            'description' => 'required',
            'number_love' => 'nullable|integer',
        ]);

        $travel->title = $request->get('title');
        $travel->status = $request->get('status');
        $travel->description = $request->get('description');
        $travel->number_love = $request->get('number_love');

        $travel->save();

        return redirect()->route('travels.index')->with('success', 'Travel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        // Delete data in pivot table travel_gallery
        $travel->galleries()->detach();

        $travel->delete();
        return redirect()->route('travels.index')->with('success', 'Travel deleted successfully.');
    }
}

