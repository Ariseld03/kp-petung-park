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
        return view('galeri.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galeri.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:10240', // Validate the file upload
            'description' => 'nullable|longtext',
            'status' => 'required|in:0,1',
        ]);
    
        // If validation passes, save the gallery data
        $gallery = new Gallery;
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->status = $request->input('status');
        $gallery->number_love = 0;
        $extension = $request->file('photo')->getClientOriginalExtension();
        
        // Generate a new file name based on the gallery name or any custom logic
        $newFileName = str_replace(' ', '_', strtolower($gallery->name)) . '_' . time() . '.' . $extension;
        
        // Save the file in 'storage/app/public/images/galeri/baru' folder
        $filePath = $request->file('photo')->storeAs('images/galeri/baru', $newFileName, 'public');
        
        // Save the file path to the database with public path (this is where it will be accessed in the URL)
        $gallery->photo_link = 'storage/images/galeri/baru/' . $newFileName; // Save as relative URL   
        $gallery->save();
    
        return redirect()->route('galeri.index')->with('Berhasil', 'Galeri berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('galeri.show', compact('gallery'));
    }
    public function showGalleriAllPengguna()
    {
        $galleries = Gallery::where('status', 1)->get();
        return view('galeri.show', compact('galleries'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('galeri.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'description' => 'nullable|string',
            'number_love' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);
        $gallery->name = $request->input('name');
        $gallery->status = $request->input('status');
        $gallery->number_love = $request->input('number_love');
        if ($request->hasFile('photo')) {
            // Get the file extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            
            // Generate a new file name based on the gallery name or any custom logic
            $newFileName = str_replace(' ', '_', strtolower($gallery->name)) . '_' . time() . '.' . $extension;
            
            // Save the file in 'storage/app/public/images/galeri/baru' folder
            $filePath = $request->file('photo')->storeAs('images/galeri/baru', $newFileName, 'public');
            
            // Save the file path to the database with public path (this is where it will be accessed in the URL)
            $gallery->photo_link = 'storage/images/galeri/baru/' . $newFileName; // Save as relative URL
        }        
        $gallery->description = $request->input('description');
        $gallery->save();

        return redirect()->route('galeri.index')->with('Berhasil', 'Galeri berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->status=0;
        $gallery->travels()->status=0;
        $gallery->articles()->status=0;
        $gallery->save();
        $message = 'Galeri berhasil dinonaktifkan.';
        return redirect()->route('galeri.index')->with('Berhasil', $message);
    }
    /**
     * Like or unlike a gallery.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $id)
{
    $gallery = Gallery::findOrFail($id);

    if ($request->input('action') === 'increment') {
        $gallery->number_love += 1; // Tambah like
    } elseif ($request->input('action') === 'decrement') {
        $gallery->number_love = max(0, $gallery->number_love - 1); // Kurangi like, minimal 0
    }

    $gallery->save();

    return response()->json(['number_love' => $gallery->number_love]);
}
}

