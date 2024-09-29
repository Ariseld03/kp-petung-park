<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Travel;
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

        return redirect()->route('agendas.index')->with('success', 'Agenda created successfully.');
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
            'staff_email' => 'required|email|exists:staffs,email', // Ensure staff email exists in staff table
        ]);
        // Find and update the Agenda record
        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->update($validatedData);
            return response()->json(['success' => true, 'message' => 'Agenda updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update agenda.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('agendas.index')->with('success', 'Agenda deleted successfully.');
    }


//TAMBAHAN-----------------------------------------------------------



public function showLayanan()
{
    // Mengambil hanya travel dengan status 1
    $travels = Travel::where('status', 1)->get();

    // Mengambil kegiatan mendatang dan lalu (sudah ada)
    $kegiatanMendatang = Agenda::where('status', 1)->where('event_end_date', '>=', now())->get();
    $kegiatanLalu = Agenda::where('status', 1)->where('event_end_date', '<', now())->get();

    // Mengirimkan $travels, $kegiatanMendatang, dan $kegiatanLalu ke view
    return view('layanan', compact('travels', 'kegiatanMendatang', 'kegiatanLalu'));
}


}

