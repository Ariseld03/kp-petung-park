<?php

namespace App\Http\Controllers;

use App\Models\SliderHome;
use Illuminate\Http\Request;

class SliderHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliderHomes = SliderHome::where('status', 1)->get();

        return view('slider-homes.index', compact('sliderHomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider-homes.create');
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

        SliderHome::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'gallery_id' => $request->input('gallery_id'),
        ]);
        return redirect()->route('sliderHomes.index')->with('Berhasil', 'Tampilan Slider Home berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SliderHome $sliderHome)
    {
        return view('sliderHomes.show', compact('sliderHome'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SliderHome $sliderHome)
    {
        return view('sliderHomes.edit', compact('sliderHome'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SliderHome $sliderHome)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'gallery_id' => 'required|integer|exists:galleries,id',
        ]);
        
        $sliderHome->name = $request->input('name');
        $sliderHome->status = $request->input('status');
        $sliderHome->gallery_id = $request->input('gallery_id');
        $sliderHome->save();

        return redirect()->route('sliderHomes.index')->with('Berhasil', 'Tampilan Slider Home berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SliderHome $sliderHome)
    {
        $sliderHome->status = 0;
        $sliderHome->save();
        return redirect()->route('sliderHomes.index')->with('Berhasil', 'Tampilan Slider Home berhasil dihapus.');
    }
}

