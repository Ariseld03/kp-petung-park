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
        $agendas = Agenda::all(); // Fetch all agenda records
        return view('kegiatan.index', compact('agendas')); // Return view with agendas data
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
        // Validate the request
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_start_date' => 'required|date',
            'event_end_date' => 'required|date',
            'event_location' => 'required|string|max:255',
            'status' => 'required|integer',
            'description' => 'nullable|string',
            'staff_email' => 'required|email|exists:staffs,email', // Ensure staff email exists in staff table
        ]);

        // Create a new Agenda record
        Agenda::create([
            'event_name' => $request->input('event_name'),
            'event_start_date' => $request->input('event_start_date'),
            'event_end_date' => $request->input('event_end_date'),
            'event_location' => $request->input('event_location'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
            'staff_email' => $request->input('staff_email'),
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Agenda berhasil ditambahkan.');
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
    public function edit(Agenda $agenda)
    {
        return view('kegiatan.edit', compact('agenda')); // Return view with form to edit agenda
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_start_date' => 'required|date',
            'event_end_date' => 'required|date',
            'event_location' => 'required|string|max:255',
            'status' => 'required|integer',
            'description' => 'nullable|string',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);
        // Find and update the Agenda record
        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->update($validatedData);
            return redirect()->route('kegiatan.index')->with('success', 'Agenda Berhasil Diubah!');
        } catch (Exception $e) {
            return redirect()->route('kegiatan.index')->with('error', 'Agenda Gagal Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        try {
            $delete = $agenda;
            $delete->status = 0;
            $agenda->update($delete);
            return redirect()->route('kegiatan.delete')->with('success', 'Agenda Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->route('kegiatan.delete')->with('error', 'Agenda Gagal Dihapus!');
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

        // Mengambil galeri terkait dengan artikel yang ditampilkan
        $galleries = collect(); // Inisialisasi sebagai koleksi
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
