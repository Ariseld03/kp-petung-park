<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'photo_link' => 'required|string|max:255',
            'description' => 'nullable|string',
            'number_love' => 'nullable|integer',
        ]);

        $gallery = new Gallery();
        $gallery->photo_link = $request->input('photo_link');
        $gallery->description = $request->input('description');
        $gallery->number_love = $request->input('number_love');
        $gallery->name = $request->input('name');
        $gallery->status = $request->input('status');
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'photo_link' => 'required|string|max:255',
            'description' => 'nullable|string',
            'number_love' => 'nullable|integer',
        ]);

        $gallery->name = $request->input('name');
        $gallery->status = $request->input('status');
        $gallery->number_love = $request->input('number_love');
        $gallery->photo_link = $request->input('photo_link');
        $gallery->description = $request->input('description');
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete data in pivot table travel_gallery
        $gallery->travels()->detach();

        // Delete data in pivot table article_gallery
        $gallery->articles()->detach();

        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }

    public function like(Request $request, Gallery $gallery)
    {
        // Cek aksi dari permintaan
        if ($request->input('action') === 'increment') {
            // Increment the number_love only if it's odd
            if ($gallery->number_love % 2 !== 0) {
                $gallery->number_love++;
            }
        } elseif ($request->input('action') === 'decrement') {
            // Decrement the number_love only if it's even
            if ($gallery->number_love % 2 === 0) {
                $gallery->number_love--;
            }
        }
    
        $gallery->save();
    
        return response()->json(['number_love' => $gallery->number_love]);
    }
    
}

