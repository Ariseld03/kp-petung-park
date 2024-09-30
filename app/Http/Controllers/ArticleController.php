<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all(); 
        return view('articles.index', compact('articles')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'main_content' => 'required|date',
            'status' => 'required|date',
            'number_love' => 'nullable|integer',
            'staff_email' => 'required|email|exists:staffs,email',
            'agenda_id' => 'required|integer|exists:agendas,id',
        ]);
        Article::create([
            'title' => $request->input('title'),
            'main_content' => $request->input('main_content'),
            'status' => $request->input('status'),
            'number_love' => $request->input('number_love'),
            'staff_email' => $request->input('staff_email'),
            'agenda_id' => $request->input('agenda_id'),
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData->validate([
            'title' => 'required|string|max:255',
            'main_content' => 'required|date',
            'status' => 'required|date',
            'number_love' => 'nullable|integer',
            'staff_email' => 'required|email|exists:staffs,email',
            'agenda_id' => 'required|exists:agendas,id',
        ]);
        $article = Article::findOrFail($id);
        $article->update($validatedData);
        response()->json(['success' => true, 'message' => 'Article updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Delete data in pivot table article_gallery
        $article->galleries()->detach();

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
    // M to M article_gallery
    /**
     * Store a newly created resource in storage for pivot table article_gallery
     */
    public function storeGallery(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'gallery_id' => 'required|integer|exists:galleries,id',
            'name_collage' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);
        $article = Article::findOrFail($id);
        $article->galleries()->attach($validatedData['gallery_id'], [
            'name_collage' => $validatedData['name_collage'],
            'status' => $validatedData['status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        response()->json(['success' => true, 'message' => 'Gallery added successfully.']);
    }

    /**
     * Update the specified resource in storage for pivot table article_gallery
     */
    public function updateGallery(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'gallery_id' => 'required|integer|exists:galleries,id',
            'name_collage' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);
        $article = Article::findOrFail($id);
        $article->galleries()->updateExistingPivot($validatedData['gallery_id'], [
            'name_collage' => $validatedData['name_collage'],
            'status' => $validatedData['status'],
            'updated_at' => now(),
        ]);
        response()->json(['success' => true, 'message' => 'Gallery updated successfully.']);
    }
}
