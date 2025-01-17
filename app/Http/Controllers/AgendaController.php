<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Travel;
use App\Models\Category;
use App\Models\Article;
use App\Models\Package;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Agenda::with('user')->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kegiatan.create'); // Return view with form to create new agenda
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            Agenda::create([
                'event_name' => $request->input('nama'),
                'event_start_date' => $request->input('tanggal_mulai'),
                'event_end_date' => $request->input('tanggal_selesai'),
                'event_location' => $request->input('lokasi'),
                'status' => 1,
                'description' => $request->input('deskripsi'),
                'user_id' => 1, // Assuming user ID is statically assigned
            ]);

            return redirect()->route('kegiatan.index')->with('success', 'Agenda berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('kegiatan.add')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return view('kegiatan.show', compact('agenda')); // Return view to show agenda details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $kegiatan)
    {
        return view('kegiatan.edit', compact('kegiatan')); // Return view with form to edit agenda
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);
        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->event_name = $request->get('nama');
            $agenda->event_start_date = $request->get('tanggal_mulai');
            $agenda->event_end_date = $request->get('tanggal_selesai');
            $agenda->event_location = $request->get('lokasi');
            $agenda->status = $request->get('status');
            $agenda->description = $request->get('deskripsi');
            // $agenda->user_id = $request->get('user_id');
            $agenda->save();
            return redirect()->route('kegiatan.index')->with('success', 'Agenda Berhasil Diubah!');
        } catch (Exception $e) {
            return redirect()->route('kegiatan.index')->with('error', 'Agenda Gagal Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Agenda $kegiatan)
    {
        try {
            $kegiatan->status = 0;
            $kegiatan->save();
            return redirect()->route('kegiatan.index')->with('success', 'Agenda Berhasil Dinonaktifkan!');
        } catch (Exception $e) {
            return redirect()->route('kegiatan.index')->with('error', 'Agenda Gagal Dinonaktifkan!');
        }
    }


    //TAMBAHAN-----------------------------------------------------------
    public function showAgenda()
    {
        $kegiatanMendatang = Agenda::where('status', 1)->where('event_end_date', '>=', now())->orderBy('event_end_date', 'desc')->get();
        $kegiatanLalu = Agenda::where('status', 1)->where('event_end_date', '<', now())->orderBy('event_end_date', 'desc')->get();
        $kategori = Category::where('status', 1)->get();
        return view('agenda', compact('kegiatanMendatang', 'kegiatanLalu'));
    }
    public function showMendatang($id)
    {
        $agenda = Agenda::findOrFail($id);

        $articles = Article::where('status', 1)->where('agenda_id', $agenda->id)->get();
        $galleries = collect(); 
        foreach ($articles as $article) {
            $articleGalleries = $article->galleries()
                ->where('article_gallery.status', 1)
                ->get();

            $galleries = $galleries->merge($articleGalleries); // Menggabungkan hasil ke dalam koleksi
        }

        return view('kegiatan.mendatang', compact('agenda', 'articles', 'galleries'));
    }


    public function showLalu($id)
    {
        $agenda = Agenda::findOrFail($id);

        $articles = Article::where('status', 1)->where('agenda_id', $agenda->id)->get();

        $galleries = collect();
        foreach ($articles as $article) {
            $articleGalleries = $article->galleries()
                ->where('article_gallery.status', 1)
                ->get();

            $galleries = $galleries->merge($articleGalleries);
        }

        return view('kegiatan.lalu', compact('agenda', 'articles', 'galleries'));
    }
}
