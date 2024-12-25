<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleGallery;
use App\Models\Gallery;
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
    public function add()
    {
        $agendas = Agenda::where('status', 1)->get();
        return view('artikel.add', compact('agendas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'agenda_id' => 'required|integer|exists:agendas,id',
        ]);
        $article = new Article([
            'user_id' => 2,
            'title' => $request->input('title'),
            'main_content' => $request->input('content'),
            'status' => 1,
            'number_love' => 0,
            'agenda_id' => $request->input('agenda_id'),
        ]);
        $article->save();
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
        $validatedData= $request->validate([
            'title' => 'required|string|max:255',
            'main_content' => 'required|string',
            'status' => 'required|integer',
            'number_love' => 'required|integer',
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


     public function indexArticleGallery()
     {
         $collages = ArticleGallery::all();
         return view('artikel.galeri.index', compact('collages'));
     }
      public function addArticleGallery()
     {
         $spots = Article::where('status', 1)->get();
         $galleries = Gallery::where('status', 1)->get();
         return view('artikel.galeri.add', compact('spots', 'galleries'));
     }
 
    public function storeArticleGallery(Request $request, string $id)
    {
        $request->validate([
            'article_id' => 'required|integer|exists:articles,id',
            'photos' => 'required|integer|exists:galleries,id',
            'photos' => 'required|array', 
            'photos.*' => 'integer|exists:galleries,id', 
            'name_collage' => 'required|string',
        ]);
        $name= $request->get('name_collage');
        $galleryIds= $request->get('photos');
        foreach($galleryIds as $galleryId){
            $articleGallery = new ArticleGallery([
                'gallery_id' => $galleryId,
                'article_id' => $request->get('article_id'),
                'name_collage' => 'Kolase '. $name,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $articleGallery->save();
        }
        return redirect()->route('artikel.galeri.index')->with('success', 'Foto di Galeri berhasil ditambahkan!');
    }
    public function editArticleGallery(Request $request)
    {
        $selectedCollage = ArticleGallery::with(['article', 'gallery'])
                                        ->where('article_id', $request->get('article_id'))
                                        ->where('gallery_id', $request->get('gallery_id'))
                                        ->first(); 
        $existingGallery = ArticleGallery::with(['article', 'gallery'])
                                        ->where('article_id', $request->get('article_id'))
                                        ->where('gallery_id', '<>', $request->get('gallery_id'))
                                        ->get(); 
        
        $galleries = Gallery::where('status', 1)->get();

        if (!$selectedCollage) {
            return redirect()->route('artikel.galeri.index')
                             ->with('error', 'The selected collage with article_id and gallery_id  was not found.');
        }
    
        return view('artikel.galeri.edit', compact('galleries', 'selectedCollage', 'existingGallery'));
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
