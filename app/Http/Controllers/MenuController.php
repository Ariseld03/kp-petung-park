<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|double',
            'status' => 'required|integer',
            'status_recommend' => 'required|integer',
            'number_love' => 'nullable|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('menu.create')->withErrors($validator)->withInput();
        }

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'status_recommend' => $request->status_recommend,
            'number_love' => $request->number_love,
            'category_id' => $request->category_id,
            'staff_email' => $request->staff_email,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }

    public function showMenuAllPengguna()
    {
        $menus = Menu::where('status', 1)->get();
        return view('menus.show', compact('menus'));
    }

    public function cariMenuDariId($id)
    {
        // Retrieve the menu with the given ID
        $menu = Menu::with('category') // Eager load the related category
                    ->findOrFail($id); // This will throw a 404 if the menu is not found
    
        // Return a view with the menu data
        return view('hidangan', compact('menu')); // Pass the menu object to the view
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|double',
            'status' => 'required|integer',
            'status_recommend' => 'required|integer',
            'number_love' => 'nullable|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'staff_email' => 'required|email|exists:staffs,email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('menu.edit', $id)->withErrors($validator)->withInput();
        }

        $menu = Menu::findOrFail($id);
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'status_recommend' => $request->status_recommend,
            'number_love' => $request->number_love,
            'category_id' => $request->category_id,
            'staff_email' => $request->staff_email,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        // Delete data in pivot table package_menus
        $menu->packages()->detach();

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
    }
}

