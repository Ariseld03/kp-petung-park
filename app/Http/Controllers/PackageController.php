<?php

namespace App\Http\Controllers;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageMenu;
use App\Models\Travel;
use App\Models\Category;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('paket.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->route('packages.create')->withErrors($validator)->withInput();
        }
        $package = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'number_love' => 0,
        ]);

        return redirect()->route('packages.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function show($id)
    {
        $paket = Package::with('menus.gallery')->findOrFail($id);
        return view('paket.show', compact('paket'));
    }
    
    public function addLike($id)
    {
        $paket = Package::findOrFail($id);
        $paket->number_love += 1;
        $paket->save();
    
        return response()->json([
            'success' => true,
            'newLikeCount' => $paket->number_love,
        ]);
    }
    
    public function like(Request $request, $id)
{
    $paket = Package::findOrFail($id);

    $sessionKey = 'liked_package_' . $id;

    if (session()->has($sessionKey)) {
        if($paket->number_love==0){
            $paket->number_love=0;
        }
        else{
            $paket->number_love--;
        }
        session()->forget($sessionKey);
    } else {
        $paket->number_love++;
        session()->put($sessionKey, true);
    }

    $paket->save();

    return response()->json(['number_love' => $paket->number_love]);
}

    public function showPaketPengguna()
    {
        $packages = Package::where('status', 1)->get();
        return view('paket.show', compact('package'));
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('paket.edit', compact('package'));
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
            return redirect()->route('packages.create')->withErrors($validator)->withInput();
        }
        $package = Package::findOrFail($id);
        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'number_love' => $request->number_love,
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diupdate!');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->status = 0;
        $package->save();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dinonaktifkan!');
    }
    // M to M package_menus
    public function createMenuPackage(Request $request)
    {
        return view('paket.createGallery', compact('package'));
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
            return redirect()->route('paket.create')->withErrors($validator)->withInput();
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

        return redirect()->route('paket.index')->with('success', 'Paket Menu berhasil ditambahkan.');
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
            return redirect()->route('paket.create')->withErrors($validator)->withInput();
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

        return redirect()->route('paket.index')->with('success', 'Paket Menu berhasil diupdate.');
    }
    public function destroyPackageMenu(Package $package)
    {
        PackageMenu::where('package_id', $package->id)->where('status', 1)->update(['status' => 0]);
        return redirect()->route('paket.index')->with('success', 'Paket Menu berhasil dihapus!');
    }

    //Tambahan 
    public function showLayanan()
{
    $paket = Package::where('status', 1)->get();
    $wisata = Travel::where('status', 1)->get();
    $kategori = Category::where('status', 1)->get();
    return view('wisata', compact('wisata', 'paket','kategori'));
}
}
