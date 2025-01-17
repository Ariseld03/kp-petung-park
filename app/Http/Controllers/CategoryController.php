<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Menu;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Category::where('status', 1)->get();
        return view('kategori.show', compact('kategori'));
    }
    public function indexAdmin()
    {
        $categories = Category::all();
        return view('kategori.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create'); // Return view with form to create new category
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('kategori.show', compact('categories'));
    }

    public function cariMakananDariKategori($id)
    {
        $kategori = Category::with(['menus' => function ($query) {
            $query->where('status', 1);
        }])->findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $kategori)
    {
        $category = Category::findOrFail($kategori->id);
        return view('kategori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kategori)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);
        // try {
            $category = Category::findOrFail($kategori);
            $category->update($validatedData);
            return redirect()->route('kategori.index')->with('success', 'Berhasil Update Kategori!');
        // } catch (\Exception $e) {
        //     return redirect()->route('kategori.index')->with('error', 'Gagal Update Kategori!');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Category $kategori)
    {
        $menus = Menu::where('category_id', $kategori)->get();
        foreach ($menus as $menu) {
            $menu->status = 0;
            $menu->save();
        }
        $category = Category::findOrFail($kategori->id);
        $category->status = 0;
        $category->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dinonaktifkan!');
    }

}
