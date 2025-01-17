<?php

namespace App\Http\Controllers;

use App\Models\SliderHome;
use App\Models\Gallery;
use Illuminate\Http\Request;

class SliderHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = SliderHome::all();
        return view('galeri.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galleries= Gallery::where('status', 1)->get();
        return view('galeri.slider.create', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photos' => 'required|array',
            'photos.*' => 'integer|exists:galleries,id',
        ]);

        foreach ($request->input('galleries') as $gallery_id) {
            SliderHome::create([
                'name' => $request->input('name'),
                'status' => 1,
                'gallery_id' => $gallery_id,
            ]);
        }
        return redirect()->route('galeri.slider.index')->with('success', 'Tampilan Slider Home berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SliderHome $sliderHome)
    {
        return view('galeri.slider.show', compact('sliderHome'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($gallery)
    {
        $slider = SliderHome::find($gallery);

        if (!$slider || Gallery::where('status', 1)->where('id', $slider->gallery_id)->doesntExist()) {
            $galleries = Gallery::where('status', 1)->get();
        } else {
            $galleries = Gallery::where('status', 1)->whereNotIn('id', [$slider->gallery_id])->get();
        }

        return view('galeri.slider.edit', compact('slider', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SliderHome $sliderHome)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'photo' => 'integer|exists:galleries,id',
        ]);
        $galleryIds = $request->input('galleries');
        
        if (!empty($galleryIds)) {
            foreach ($galleryIds as $galleryId) {
                if ($request->input('photo')) {
                    $sliderHome->gallery_id = $request->input('photo');
                } else {
                    $sliderHome->gallery_id = $galleryId;
                }
                $sliderHome->name = $request->input('name');
                $sliderHome->status = $request->input('status');
                $sliderHome->updated_at = now();
                $sliderHome->save();
            }
        }
        return redirect()->route('galeri.slider.index')->with('success', 'Tampilan Slider Home berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($gallery)
    {
        $sliderHome = SliderHome::findorFail($gallery);
        $sliderHome->status=0;
        $sliderHome->save();
        return redirect()->route('galeri.slider.index')->with('success', 'Tampilan Slider Home berhasil dinonaktifkan.');
    }
}

