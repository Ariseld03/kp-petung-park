<?php

namespace App\Http\Controllers;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageMenu;
use App\Models\Travel;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
    }

    public function add()
    {
        $menus = Menu::where('status', 1)->get();
        return view('menu.paket.add', compact('menus'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'status' => 'required|integer',
        ]);
        $package = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'number_love' => 0,
        ]);

        return redirect()->route('menu.paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function show($id)
    {
        $paket = Package::with('menus.gallery')->findOrFail($id);
        return view('menu.paket.show', compact('paket'));
    }

    public function showPaketPengguna()
    {
        $packages = Package::where('status', 1)->get();
        return view('menu.paket.show', compact('package'));
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('menu.paket.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'status' => 'required|integer',
            'number_love' => 'nullable|integer',
        ]);
        $package = Package::findOrFail($package->id);
        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'number_love' => $request->number_love,
            'update_date' => now(),
        ]);

        return redirect()->route('menu.index')->with('success', 'Paket berhasil diupdate!');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->status = 0;
        $package->save();
        return redirect()->route('menu.paket.index')->with('success', 'Paket berhasil dinonaktifkan!');
    }

    // M to M package_menus
    public function createMenuPackage(Request $request)
    {
        return view('menu.paket.addGallery', compact('package'));
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
        PackageMenu::create([
            'menu_id' => $request->menu_id,
            'menu_category_id' => $request->menu_category_id,
            'package_id' => $request->package_id,
            'name' => $request->name,
            'status' => $request->status,
            'create_date' => now(),
            'update_date' => now(),
        ]);

        return redirect()->route('menu.paket.index')->with('success', 'Paket Menu berhasil ditambahkan.');
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
        $packageMenu = PackageMenu::findOrFail($id);
        $packageMenu->update([
            'menu_id' => $request->menu_id,
            'menu_category_id' => $request->menu_category_id,
            'package_id' => $request->package_id,
            'name' => $request->name,
            'status' => $request->status,
            'update_date' => now(),
        ]);

        return redirect()->route('menu.paket.index')->with('success', 'Paket Menu berhasil diupdate.');
    }

    public function destroyPackageMenu(Package $package)
    {
        PackageMenu::where('package_id', $package->id)->where('status', 1)->update(['status' => 0]);
        return redirect()->route('menu.paket.index')->with('success', 'Paket Menu berhasil dihapus!');
    }

    //Tambahan 
    public function showLayanan()
    {
        $paket = Package::where('status', 1)->get();
        $wisata = Travel::where('status', 1)->get();
        $kategori = Category::where('status', 1)->get();
        return view('wisata', compact('wisata', 'paket', 'kategori'));
    }

    public function addLike($id)
    {
        $paket = Package::findOrFail($id);
        $paket->number_love += 1;
        $paket->save();
        return redirect()->route('menu.paket.index')->with('success', 'Terimakasih atas apresiasi Anda terhadap paket ini!');
    }

    public function removeLike($id)
    {
        $paket = Package::findOrFail($id);
        $paket->number_love -= 1;
        $paket->save();
        return redirect()->route('menu.paket.index')->with('success', 'Apresiasi Anda terhadap paket ini telah dicabut!');
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

}

