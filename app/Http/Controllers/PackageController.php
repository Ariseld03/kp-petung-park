<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('package.index', compact('packages'));
    }

    public function create()
    {
        return view('package.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'status' => 'required|integer',
            'number_love' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->route('package.create')->withErrors($validator)->withInput();
        }
        $package = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'number_love' => $request->number_love,
        ]);

        return redirect()->route('package.index')->with('success', 'Package created successfully');
    }

    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('package.show', compact('package'));
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('package.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'status' => 'required|integer',
            'number_love' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->route('package.create')->withErrors($validator)->withInput();
        }
        $package = Package::findOrFail($id);
        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'number_love' => $request->number_love,
        ]);

        return redirect()->route('package.index')->with('success', 'Package updated successfully');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);

        // Delete data in pivot table package_menus
        $package->menus()->detach();

        $package->delete();

        return redirect()->route('package.index')->with('success', 'Package deleted successfully');
    }
    
    public function createMenuPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required|integer|exists:menus,id',
            'menu_category_id' => 'required|integer|exists:menu_categories,id',
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->route('package.create')->withErrors($validator)->withInput();
        }
        PackageMenu::create([
            'menu_id' => $request->menu_id,
            'menu_category_id' => $request->menu_category_id,
            'package_id' => $request->package_id,
            'name' => $request->name,
            'status' => $request->status,
            'create_date' => now(),
            'update_date' => now(),
        ]);

        return redirect()->route('package.index')->with('success', 'Menu for package created successfully');
    }

    public function storeMenuPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required|integer|exists:menus,id',
            'menu_category_id' => 'required|integer|exists:menu_categories,id',
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->route('package.create')->withErrors($validator)->withInput();
        }
        PackageMenu::create([
            'menu_id' => $request->menu_id,
            'menu_category_id' => $request->menu_category_id,
            'package_id' => $request->package_id,
            'name' => $request->name,
            'status' => $request->status,
            'create_date' => now(),
            'update_date' => now(),
        ]);

        return redirect()->route('package.index')->with('success', 'Menu for package created successfully');
    }

    public function updateMenuPackage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required|integer|exists:menus,id',
            'menu_category_id' => 'required|integer|exists:menu_categories,id',
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->route('package.create')->withErrors($validator)->withInput();
        }
        $packageMenu = PackageMenu::findOrFail($id);
        $packageMenu->update([
            'menu_id' => $request->menu_id,
            'menu_category_id' => $request->menu_category_id,
            'package_id' => $request->package_id,
            'name' => $request->name,
            'status' => $request->status,
            'update_date' => now(),
        ]);

        return redirect()->route('package.index')->with('success', 'Menu for package updated successfully');
    }
}
