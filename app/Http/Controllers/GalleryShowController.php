<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\GalleryShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\SliderHome;

class GalleryShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data galleries_show dengan status 1 dan data tambahan dari galleries
        $galleryShows = GalleryShow::where('status', 1)->get();
        $sliderHomes = SliderHome::where('status', 1)->get();
        // dd($sliderHomes);
        return view('beranda', compact('galleryShows','sliderHomes'));
    }
    
    public function indexAdmin()
    {
        // Mengambil data galleries_show dengan status 1 dan data tambahan dari galleries
        $galleryShows = GalleryShow::all();
        return view('beranda', compact('galleryShows'));
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
        return redirect()->route('galleryShows.index')->with('Berhasil', 'Tampilan Galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryShow $galleryShow)
    {
        return view('galleryShows.show', compact('galleryShow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryShow $galleryShow)
    {
        return view('galleryShows.edit', compact('galleryShow'));
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

        return redirect()->route('galleryShows.index')->with('Berhasil', 'Tampilan Galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryShow $galleryShow)
    {
        $galleryShow->status=0;
        $galleryShow->save();

        return redirect()->route('galleryShows.index')->with('Berhasil', 'Tampilan Galeri berhasil dihapus!');
    }
}

