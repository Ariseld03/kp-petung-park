<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GenericController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generics = Generic::all();
        return view('generic.index', compact('generics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $generic = new Generic;
        $generic->key = $request->input('key');
        $generic->value = $request->input('value');
        $generic->status = 1;
        $generic->user_id = Auth::user()->id;
        $extension = $request->file('photo')->getClientOriginalExtension();
        
        // Generate a new file name based on the gallery name or any custom logic
        $newFileName = str_replace(' ', '_', strtolower($generic->key)) . '_' . time() . '.' . $extension;
        
        // Save the file in 'storage/app/public/images/galeri/baru' folder
        $filePath = $request->file('photo')->storeAs('images/galeri/baru', $newFileName, 'public');
        
        // Save the file path to the database with public path (this is where it will be accessed in the URL)
        $generic->icon_picture_link = 'storage/images/galeri/baru/' . $newFileName; // Save as relative URL   
        $generic->created_at = now();
        $generic->updated_at = now();
        $generic->save();

        return redirect()->route('generic.index')->with('success', 'Data umum berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generic $generic)
    {
        return view('generic.edit', compact('generic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Generic $generic)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'status' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);       
        $generic->key = $request->input('key');
        $generic->value = $request->input('value');
        $generic->status = $request->input('status');
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            
            $newFileName = str_replace(' ', '_', strtolower($generic->name)) . '_' . time() . '.' . $extension;
            
            $filePath = $request->file('photo')->storeAs('images/galeri/baru', $newFileName, 'public');
            
            $generic->photo_link = 'storage/images/galeri/baru/' . $newFileName; // Save as relative URL
        }  
        $generic->updated_at = now();      
        $generic->save();

        return redirect()->route('generic.index')->with('success', 'Data umum berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Generic $generic)
    {
        $generic->status = 0;
        $generic->save();

        return redirect()->route('generic.index')->with('success', 'Data umum berhasil dinonaktifkan!');
    }
    public function aboutUs()
    {
        $aboutUs = [];
        $data = Generic::where('status',1)->get();
        $aboutUs = [
            'sejarah' => null,
            'visi_misi' => null,
            'gambar' => null,
        ];

        // Loop through the data and assign values
        foreach ($data as $item) {
            switch ($item->key) {
                case 'sejarah':
                    $aboutUs['sejarah_nama'] = 'Sejarah';
                    $aboutUs['sejarah_text'] = $item->value; 
                    break;
                case 'sejarah_2':
                    $aboutUs['sejarah_2_text'] = $item->value;
                    break;
                case 'visi_misi':
                    $aboutUs['visi_misi_nama'] = 'Visi & Misi'; 
                    $aboutUs['visi_misi_text'] = $item->value; 
                    break;
                case 'visi_misi_2':
                    $aboutUs['visi_misi_2_text'] = $item->value;
                    break;
                case 'gambar_baris_1':
                    $aboutUs['gambar1'] = $item->icon_picture_link; 
                    break;
                case 'gambar_baris_2':
                    $aboutUs['gambar2'] = $item->icon_picture_link; 
                    break;
                case 'gambar_baris_3':
                    $aboutUs['gambar3'] = $item->icon_picture_link; 
                    break;    
            }
        }
        return view('tentangKami', compact('aboutUs'));
    }
}

