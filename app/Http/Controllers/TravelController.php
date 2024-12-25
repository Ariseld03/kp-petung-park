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
        $spots = Travel::all();
        return view('wisata.index', compact('spots'));
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
            'photos' => 'required|array', 
            'photos.*' => 'integer|exists:galleries,id', 
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
    $spot = Travel::findOrFail($id);
    
    // Mengambil data gallery yang berhubungan dengan travel ini
    $galleries = TravelGallery::where('travel_id', $id)
    ->where('status', 1)
    ->with('gallery') 
    ->get()
    ->pluck('gallery'); 


    return view('wisata.show', compact('spot', 'galleries'));
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
        $spots = Travel::where('status', 1)->get();
        $galleries = Gallery::where('status', 1)->get();
        return view('wisata.gallery.add', compact('spots', 'galleries'));
    }

    /**
     * Store a newly created resource in storage for pivot table travel_gallery.
     */
    public function storeTravelGallery(Request $request)
    {
        $request->validate([
            'travel_id' => 'required|integer|exists:travels,id',
            'photos' => 'required|integer|exists:galleries,id',
            'photos' => 'required|array', 
            'photos.*' => 'integer|exists:galleries,id', 
            'name_collage' => 'required|string',
        ]);
        $name= $request->get('name_collage');
        $galleryIds= $request->get('photos');
        foreach($galleryIds as $galleryId){
            $travelGallery = new TravelGallery([
                'gallery_id' => $galleryId,
                'travel_id' => $request->get('travel_id'),
                'name_collage' => 'Kolase '. $name,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $travelGallery->save();
        }
        return redirect()->route('wisata.gallery.index')->with('success', 'Foto di Galeri berhasil ditambahkan!');
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
        $existingGallery = TravelGallery::with(['travel', 'gallery'])
                                        ->where('travel_id', $request->get('travel_id'))
                                        ->where('gallery_id', '<>', $request->get('gallery_id'))
                                        ->get(); 
        
        $galleries = Gallery::where('status', 1)->get();

        if (!$selectedCollage) {
            return redirect()->route('wisata.gallery.index')
                             ->with('error', 'The selected collage with travel_id and gallery_id  was not found.');
        }
    
        return view('wisata.gallery.edit', compact('galleries', 'selectedCollage', 'existingGallery'));
    }
    
    
    /**
     * Update the specified resource in storage for pivot table travel_gallery.
     */
    public function updateTravelGallery(Request $request)
{
    $request->validate([
        'travel_id' => 'required|integer',
        'gallery_id' => 'required|array', 
        'gallery_id.*' => 'integer|exists:galleries,id', 
        'name_collage' => 'required|string',
        'status' => 'required|integer',
        'new_photos' => 'nullable|array',
        'new_photos.*' => 'integer|exists:galleries,id', 
    ]);

    try {
        $travelId = $request->get('travel_id');
        $oldGalleryIds = $request->get('gallery_id');
        $nameCollage = $request->get('name_collage');
        $status = $request->get('status');
        $newGalleryIds = $request->get('new_photos', []);
        if (!empty($newGalleryIds)) {
              // Ensure that the old and new gallery IDs are integers
                $oldGalleryIds = array_map('intval', $oldGalleryIds);
                $newGalleryIds = array_map('intval', $newGalleryIds);

                // Step 1: Find the galleries that need to be removed
                // Remove galleries that are in the old data but not in the new data
                $galleryIdsToRemove = array_diff($oldGalleryIds, $newGalleryIds);


                // Delete the galleries that need to be removed
                if (!empty($galleryIdsToRemove)) {
                    TravelGallery::where('travel_id', $travelId)
                                ->whereIn('gallery_id', $galleryIdsToRemove)
                                ->delete();
                }

                // Step 2: Add the new gallery ids that aren't already in the database
                $existingGalleryIds = TravelGallery::where('travel_id', $travelId)
                                                ->whereIn('gallery_id', $newGalleryIds)
                                                ->pluck('gallery_id')
                                                ->toArray();

                // Find the new gallery IDs that don't exist in the database
                $filteredNewGalleryIds = array_diff($newGalleryIds, $existingGalleryIds);

            // Insert the new gallery records
            foreach ($filteredNewGalleryIds as $galleryId) {
                TravelGallery::create([
                    'travel_id' => $travelId,
                    'gallery_id' => $galleryId,
                    'name_collage' => $nameCollage,
                    'status' => $status,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]);
            }
        } else {
            // If no new photos, update existing records with new details
            TravelGallery::where('travel_id', $travelId)
                         ->whereIn('gallery_id', $oldGalleryIds)
                         ->update([
                             'name_collage' => $nameCollage,
                             'status' => $status,
                             'updated_at' => now(),
                         ]);
        }
    
        return redirect()->route('wisata.gallery.index')->with('success', 'Data kolase berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->route('wisata.gallery.edit', [
            'travel_id' => $request->get('travel_id'),
            'gallery_id' => $oldGalleryIds
        ])->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
    
}

public function deleteTravelGallery($travel)
{
    try {
        // Update all matching records to status 0
        TravelGallery::where('travel_id', $travel)
            ->update([
                'status' => 0,
                'updated_at' => now(),
            ]);

        return redirect()->route('wisata.gallery.index')->with('success', 'Kolase berhasil dinonaktifkan!');
    } catch (\Exception $e) {
        return redirect()->route('wisata.gallery.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

}

