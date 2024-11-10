<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Travel;
use App\Models\Category;
use App\Models\Article;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::all(); // Fetch all agenda records
        return view('agendas.index', compact('agendas')); // Return view with agendas data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agendas.create'); // Return view with form to create new agenda
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

        return redirect()->route('agendas.index')->with('Berhasil', 'Agenda berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return view('agendas.show', compact('agenda')); // Return view to show agenda details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return view('agendas.edit', compact('agenda')); // Return view with form to edit agenda
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
            return redirect()->route('agendas.index')->with('Berhasil', 'Agenda Berhasil Diubah!');
        } catch (Exception $e) {
            return redirect()->route('agendas.index')->with('Gagal', 'Agenda Gagal Diubah!');
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
            return redirect()->route('agendas.delete')->with('Berhasil', 'Agenda Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->route('agendas.delete')->with('Gagal', 'Agenda Gagal Dihapus!');
        }
    }


//TAMBAHAN-----------------------------------------------------------

public function showLayanan()
{
    $travels = Travel::where('status', 1)->get();
    $kegiatanMendatang = Agenda::where('status', 1)->where('event_end_date', '>=', now())->get();
    $kegiatanLalu = Agenda::where('status', 1)->where('event_end_date', '<', now())->get();
    $kategori = Category::where('status', 1)->get();
    return view('layanan', compact('travels', 'kegiatanMendatang', 'kegiatanLalu','kategori'));
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

    return view('kegiatanMendatang', compact('agenda', 'articles', 'galleries'));
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

    return view('kegiatanLalu', compact('agenda', 'articles', 'galleries'));
}

}

