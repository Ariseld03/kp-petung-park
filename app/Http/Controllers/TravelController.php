<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisata = Travel::where('status', 1)->get(); // Mengambil hanya travel dengan status 1
        return view('layanan', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wisata.create');
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
        ]);

        $travel = new Travel([
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'description' => $request->get('description'),
            'number_love' => 0,
        ]);

        $travel->save();

        return redirect()->route('wisata.index')->with('Berhasil', 'Wisata berhasil ditambahkan!');
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
    public function edit(Travel $travel)
    {
        return view('wisata.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|tinyint',
            'description' => 'required|longtext',
            'number_love' => 'nullable|integer',
        ]);

        $travel->title = $request->get('title');
        $travel->status = $request->get('status');
        $travel->description = $request->get('description');
        $travel->number_love = $request->get('number_love');

        $travel->save();

        return redirect()->route('wisata.index')->with('Berhasil', 'Wisata berhasil diubah!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        // Delete data in pivot table travel_gallery
        //$travel->galleries()->detach();

        $travel->status=0;
        $travel->save();
        return redirect()->route('wisata.index')->with('Berhasil', 'Wisata berhasil dihapus!');
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

        return redirect()->route('wisata.index')->with('Berhasil', 'Foto di Galeri berhasil ditambahkan!' . $travel->title);
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
        ]);

        DB::table('travel_gallery')->where('id', $id)->update([
            'travel_id' => $travel->id,
            'gallery_id' => $request->get('gallery_id'),
            'name_collage' => $request->get('name_collage'),
            'status' => $request->get('status'),
            'updated_at' => now(),
        ]);

        return redirect()->route('wisata.index')->with('Berhasil', 'Foto di Wisata berhasil diubah! ' . $travel->title);
    }
    public function destroyTravelGallery(Travel $travel)
    {
        DB::table('travel_gallery')->where('travel_id', $travel->id)->update(['status' => 0]);
        return redirect()->route('wisata.index')->with('Berhasil', 'Foto di Wisata berhasil dihapus!');
    }
}

