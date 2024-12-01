<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\Gallery;
use App\Models\TravelGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisatas = Travel::all();
        return view('wisata.index', compact('wisatas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $galleries = Gallery::where('status', 1)->get();
        return view('wisata.add', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photos' => 'required|array', // Validate photos as an array
            'photos.*' => 'integer|exists:galleries,id', // Ensure each photo ID exists in the gallery
        ]);
        try{
            $travel = new Travel([
                'name' => $request->get('name'),
                'status' => 1,
                'description' => $request->get('description'),
                'number_love' => 0,
            ]);
            $name = $request->get('name');
            $travel->save();
            foreach($request->get('photos') as $galleryId){
                $travelGallery = new TravelGallery([
                    'gallery_id' => $galleryId,
                    'travel_id' => $travel->id,
                    'name_collage' => 'Kolase '. $name,
                    'status' => 1,
                ]);
                $travelGallery->save();
            }
            return redirect()->route('wisata.index')->with('success', 'Wisata berhasil ditambahkan!');

        }
        catch(\Exception $e){
            return redirect()->route('wisata.add')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $travel = Travel::findOrFail($id);
    
    // Mengambil data gallery yang berhubungan dengan travel ini
    $galleries = TravelGallery::where('travel_id', $id)
    ->where('status', 1)
    ->with('gallery') 
    ->get()
    ->pluck('gallery'); 


    return view('wisata.show', compact('travel', 'galleries'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $wisata)
    {
        $galleries = Gallery::where('status', 1)->get();
        return view('wisata.edit', compact('wisata', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $wisata)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|integer',
                'description' => 'nullable|string',
                'number_love' => 'nullable|integer',
            ]);
            $wisata->name = $request->get('name');
            $wisata->status = $request->get('status');
            $wisata->description = $request->get('description');
            $wisata->number_love = $request->get('number_love');
            $wisata->updated_at = now();
            $wisata->save();

            return redirect()->route('wisata.index')->with('success', 'Wisata berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->route('wisata.edit', $travel->id)->with('error', $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(Travel $wisata)
    {
        $wisata->status = 0;
        $wisata->save();

        TravelGallery::where('travel_id', $wisata->id)->update(['status' => 0]);

        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil dinonaktifkan!');
    }
    
    /**
     * M to M for pivot table travel_gallery
     */
    
    /**
     * Display a listing of the resource for pivot table travel_gallery.
     */
    public function indexTravelGallery()
    {
        $collages = TravelGallery::all();

        return view('wisata.gallery.index', compact('collages'));
    }
     public function addTravelGallery()
    {
        $travels = Travel::where('status', 1)->get();
        $galleries = Gallery::where('status', 1)->get();
        return view('wisata.gallery.add', compact('travels', 'galleries'));
    }

    /**
     * Store a newly created resource in storage for pivot table travel_gallery.
     */
    public function storeTravelGallery(Request $request, Travel $travel)
    {
        $request->validate([
            'travel_id' => 'required|integer',
            'gallery_id' => 'required|integer',
            'name_collage' => 'required|string',
            'status' => 'required|integer',
        ]);
        $name= $request->get('name_collage');
        foreach($request->get('new_photos') as $galleryId){
            $travelGallery = new TravelGallery([
                'gallery_id' => $galleryId,
                'travel_id' => $travel->id,
                'name_collage' => 'Kolase '. $name,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $travelGallery->save();
        }
        return redirect()->route('wisata.gallery.index')->with('success', 'Foto di Galeri berhasil ditambahkan!' . $travel->title);
    }

    /**
     * Show the form for editing the specified resource in pivot table travel_gallery.
     */
    public function editTravelGallery(Request $request)
    {
        $selectedCollage = TravelGallery::with(['travel', 'gallery'])
                                        ->where('travel_id', $request->get('travel_id'))
                                        ->where('gallery_id', $request->get('gallery_id'))
                                        ->first(); 
    
        $travels = Travel::where('status', 1)->get();
        $galleries = Gallery::where('status', 1)->get();

        if (!$selectedCollage) {
            return redirect()->route('wisata.gallery.index')
                             ->with('error', 'The selected collage with travel_id ' . $request->get('travel_id') . ' and gallery_id ' . $request->get('gallery_id') . ' was not found.');
        }
    
        return view('wisata.gallery.edit', compact('travels', 'galleries', 'selectedCollage'));
    }
    
    
    /**
     * Update the specified resource in storage for pivot table travel_gallery.
     */
    public function updateTravelGallery(Request $request)
    {
        $request->validate([
            'travel_id' => 'required|integer',
            'gallery_id' => 'required|integer',
            'name_collage' => 'required|string',
            'status' => 'required|integer',
            'new_travels' => 'nullable|array', 
            'new_travels.*' => 'integer|exists:travels,id',
            'new_photos' => 'nullable|array', // Validate photos as an array
            'new_photos.*' => 'integer|exists:galleries,id', // Ensure each photo ID exists in the gallery
        ]);

        TravelGallery::where('travel_id', $request->get('travel_id'))
                    ->where('gallery_id', $request->get('gallery_id'))
                    ->update([
                        'name_collage' => $request->get('name_collage'),
                        'status' => $request->get('status'),
                        'updated_at' => now(),
                    ]);

        return redirect()->route('wisata.gallery.index')->with('success', 'Foto di Wisata berhasil diubah! ');
    }
    public function deleteTravelGallery($gallery, $travel)
    {
        TravelGallery::where('travel_id', $travel)
                    ->where('gallery_id', $gallery)
                    ->update([
                        'status' => 0,
                        'updated_at' => now(),
                    ]);
        return redirect()->route('wisata.gallery.index')->with('success', 'Foto di Wisata berhasil dinonaktifkan!');
    }
}

