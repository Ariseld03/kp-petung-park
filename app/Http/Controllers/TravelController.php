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
    $galleries = DB::table('galleries')
        ->join('travel_gallery', 'galleries.id', '=', 'travel_gallery.gallery_id')
        ->where('travel_gallery.travel_id', $id)
        ->where('travel_gallery.status', 1)
        ->select('galleries.*')
        ->get();

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
    
        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil dinonaktifkan!');
    }
    
    /**
     * M to M for pivot table travel_gallery
     */
    public function createTravelGallery(Travel $travel)
    {
        return view('wisata.createGallery', compact('travel'));
    }

    /**
     * Store a newly created resource in storage for pivot table travel_gallery.
     */
    public function storeGallery(Request $request, Travel $travel)
    {
        $request->validate([
            'gallery_id' => 'required|integer',
            'name_collage' => 'required|string',
            'status' => 'required|integer',
        ]);

        DB::table('travel_gallery')->insert([
            'travel_id' => $travel->id,
            'gallery_id' => $request->get('gallery_id'),
            'name_collage' => $request->get('name_collage'),
            'status' => $request->get('status'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        foreach($request->get('new_photos') as $galleryId){
            $travelGallery = new TravelGallery([
                'gallery_id' => $galleryId,
                'travel_id' => $travel->id,
                'name_collage' => 'Kolase '. $name,
                'status' => 1,
            ]);
            $travelGallery->save();
        }
        return redirect()->route('wisata.index')->with('success', 'Foto di Galeri berhasil ditambahkan!' . $travel->title);
    }

    /**
     * Show the form for editing the specified resource in pivot table travel_gallery.
     */
    public function editGallery(Travel $travel, $id)
    {
        $gallery = DB::table('travel_gallery')->where('id', $id)->first();
        return view('wisata.editGallery', compact('travel', 'gallery'));
    }

    /**
     * Update the specified resource in storage for pivot table travel_gallery.
     */
    public function updateGallery(Request $request, Travel $travel, $id)
    {
        $request->validate([
            'gallery_id' => 'required|integer',
            'name_collage' => 'required|string',
            'status' => 'required|integer',
            'new_photos' => 'nullable|array', // Validate photos as an array
            'new_photos.*' => 'integer|exists:galleries,id', // Ensure each photo ID exists in the gallery


        ]);

        DB::table('travel_gallery')->where('id', $id)->update([
            'travel_id' => $travel->id,
            'gallery_id' => $request->get('gallery_id'),
            'name_collage' => $request->get('name_collage'),
            'status' => $request->get('status'),
            'updated_at' => now(),
        ]);

        return redirect()->route('wisata.index')->with('success', 'Foto di Wisata berhasil diubah! ' . $travel->title);
    }
    public function destroyTravelGallery(Travel $travel)
    {
        DB::table('travel_gallery')->where('travel_id', $travel->id)->update(['status' => 0]);
        return redirect()->route('wisata.index')->with('success', 'Foto di Wisata berhasil dihapus!');
    }
}

