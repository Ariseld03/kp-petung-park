<?php

namespace App\Http\Controllers;

use App\Models\GalleryShow;
use Illuminate\Http\Request;

class GalleryShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryShows = GalleryShow::latest()->paginate(10);

        return view('gallery-shows.index', compact('galleryShows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery-shows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'gallery_id' => 'required|integer|exists:galleries,id',
        ]);

        GalleryShow::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'gallery_id' => $request->input('gallery_id'),
        ]);
        return redirect()->route('gallery-shows.index')->with('success', 'Gallery show created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryShow $galleryShow)
    {
        return view('gallery-shows.show', compact('galleryShow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryShow $galleryShow)
    {
        return view('gallery-shows.edit', compact('galleryShow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryShow $galleryShow)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'gallery_id' => 'required|integer|exists:galleries,id',
        ]);
        
        $galleryShow->name = $request->input('name');
        $galleryShow->status = $request->input('status');
        $galleryShow->gallery_id = $request->input('gallery_id');
        $galleryShow->save();

        return redirect()->route('gallery-shows.index')->with('success', 'Gallery show updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryShow $galleryShow)
    {
        $galleryShow->delete();

        return redirect()->route('gallery-shows.index')->with('success', 'Gallery show deleted successfully.');
    }
}
