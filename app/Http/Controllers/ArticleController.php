<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleGallery;
use App\Models\Agenda;
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
        return view('artikel.index', compact('articles')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel.create');
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
            'user_id' => 'required|integer|exists:users,id',
            'agenda_id' => 'required|integer|exists:agendas,id',
        ]);
        Article::create([
            'title' => $request->input('title'),
            'main_content' => $request->input('main_content'),
            'status' => 1,
            'number_love' => 0,
            'user_id' => 1,
            'agenda_id' => $request->input('agenda_id'),
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function showArtikelAllPengguna()
    {
        $articles = Article::where('status', 1)->get();
        return view('artikel.show', compact('article'));
    }
    public function show(Article $article)
    {
        $articles = Article::where('status', 1)->get();
        return view('artikel', compact('artikel'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $artikel)
    {
        $artikel = Article::with('agenda')->findOrFail($artikel->id);
        $agendas = Agenda::where('status', 1)->get();
        return view('artikel.edit', compact('artikel', 'agendas'));
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
            'user_id' => 'required|email|exists:users,id',
            'agenda_id' => 'required|exists:agendas,id',
        ]);
        try {
            $article = Article::findOrFail($id);
            $article->update($validatedData);
            return redirect()->route('artikel.index')->with('success', 'Article berhasil Diupdate!');
        } catch (Exception $e) {
            return redirect()->route('artikel.index')->with('error', 'Article Gagal Diupdate!');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(Article $artikel)
    {
        $artikel->status = 0;
        $artikel->save();
        ArticleGallery::where('article_id', $artikel->id)->update(['status' => 0]);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dinonaktifkan!');
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
        return redirect()->route('artikel.index')->with('success', 'Foto di Artikel Berhasil Ditambah!');
    }

    /**
     * Update the specified resource in storage for pivot table article_gallery
     */
    public function updateArticleGallery(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'gallery_id' => 'required|integer|exists:galleries,id',
            'name_collage' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);
        try {
            $article = Article::findOrFail($id);
            $article->galleries()->updateExistingPivot($validatedData['gallery_id'], [
                'name_collage' => $validatedData['name_collage'],
                'status' => $validatedData['status'],
                'updated_at' => now(),
            ]);
            return redirect()->route('artikel.index')->with('success', 'Foto di Artikel Berhasil Diubah!');
        } catch (Exception $e) {
            return redirect()->route('artikel.index')->with('error', 'Foto di Artikel Gagal Diubah!');
        }
    }
    public function deleteArticleGallery(Request $request, string $id)
    {
        try {
            $delete= $request;
            $delete->status = 0;
            $request = Article::findOrFail($id);
            $request->update($delete);
            return redirect()->route('articleGalleries.index')->with('success', 'Foto di Artikel Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->route('articleGalleries.index')->with('error', 'Foto di Artikel Gagal Dihapus!');
        }
    }
    public function destroyArticleGallery(Article $article)
    {
        Article::findOrFail($article->id)->update(['status' => 0]);
        return redirect()->route('artikel.index')->with('success', 'Foto di Artikel berhasil dihapus!');
    }
}
