<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenericController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generics = Generic::all();
        return view('generics.index', compact('generics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|longtext',
            'status' => 'required|integer',
            'icon_picture_link' => 'string|max:255',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);

        Generic::create([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
            'status' => $request->input('status'),
            'icon_picture_link' => $request->input('icon_picture_link'),
            'staff_email' => $request->input('staff_email'),
        ]);

        return redirect()->route('generics.index')->with('success', 'Data umum berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Generic $generic)
    {
        return view('generics.show', compact('generic'));
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
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generic $generic)
    {
        return view('generics.edit', compact('generic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Generic $generic)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|longtext',
            'status' => 'required|integer',
            'icon_picture_link' => 'string|max:255',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);
        $generic->key = $request->input('key');
        $generic->value = $request->input('value');
        $generic->icon_picture_link = $request->input('icon_picture_link');
        $generic->staff_email = $request->input('staff_email');
        $generic->status = $request->input('status');
        $generic->save();

        return redirect()->route('generics.index')->with('success', 'Data umum berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generic $generic)
    {
        $generic->status = 0;
        $generic->save();

        return redirect()->route('generics.index')->with('success', 'Data umum berhasil dihapus!');
    }
}

