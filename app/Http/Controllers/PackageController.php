<?php

namespace App\Http\Controllers;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageMenu;
use App\Models\Travel;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Gallery;
use App\Models\TravelGallery;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
    }

    public function add()
    {
        $menus = Menu::where('status', 1)->get();
        $galleries = Gallery::where('status', 1)
                            ->where('name', 'like', '%paket%')
                            ->get();
        return view('menu.paket.add', compact('menus','galleries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'status' => 'required|integer|in:0,1',
            'menus' => 'required|array',
            'menus.*' => 'integer|exists:menus,id', 
            'photos' => 'required|array',
            'photos.*' => 'integer|exists:galleries,id', 
        ]);
        
        $packagePhotos = $request->get('gallery_id'); 
        $menus = $request->get('menus'); 
        $galleryId = $request->get('photo');      
            $package = new Package([
                'name' => $request->name,
                'price' => $request->price,
                'status' => 1,
                'number_love' => 0,
                'gallery_id' => $galleryId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $package->save();
        foreach($menus as $menu){
            $menu = Menu::findOrFail($menu);
            $travelGallery = new PackageMenu([
                'package_id' => $package->id,
                'menu_id' => $menu->id,
                'status' => 1,
            ]);
            $travelGallery->save();
        }
        return redirect()->route('menu.index')->with('success', 'Paket berhasil ditambahkan!');
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
        $galleries = Gallery::where('status', 1)
        ->where('name', 'like', '%paket%')
        ->get();
        return view('menu.paket.edit', compact('package', 'galleries'));
    }

    public function update(Request $request, Package $package)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'status' => 'required|integer',
            'number_love' => 'nullable|integer',
            'new_photo' => 'nullable|integer|exists:galleries,id',
        ]);

        $package = Package::findOrFail($package->id);

        if ($request->has('new_photo')) {
            $package->gallery_id = $request->new_photo;
        }

        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'number_love' => $request->number_love,
            'update_date' => now(),
        ]);

        $package->save();

        return redirect()->route('menu.index')->with('success', 'Paket berhasil diupdate!');
    }

    public function delete($id)
    {
        $package = Package::findOrFail($id);
        $package->status = 0;
        $package->save();
        return redirect()->route('menu.index')->with('success', true);;
    }

    // M to M package_menus
    public function createMenuPackage(Request $request)
    {
        return view('menu.menupaket.add', compact('package'));
    }

    public function storeMenuPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required|integer|exists:menus,id',
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);
        PackageMenu::create([
            'menu_id' => $request->menu_id,
            'package_id' => $request->package_id,
            'name' => $request->name,
            'status' => $request->status,
            'create_date' => now(),
            'update_date' => now(),
        ]);

        return redirect()->route('menu.menupaket.index')->with('success', 'Paket Menu berhasil ditambahkan.');
    }
    public function editMenuPackage($id)
    {
        $packageMenu = PackageMenu::findOrFail($id);
        $menus = Menu::where('status', 1)->get();
        return view('menu.menupaket.edit', compact('packageMenu', 'menus'));
    }
    public function updateMenuPackage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required|integer|exists:menus,id',
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);
        $packageMenu = PackageMenu::findOrFail($id);
        $packageMenu->update([
            'menu_id' => $request->menu_id,
            'package_id' => $request->package_id,
            'name' => $request->name,
            'status' => $request->status,
            'update_date' => now(),
        ]);

        return redirect()->route('menu.menupaket.index')->with('success', 'Paket Menu berhasil diupdate.');
    }

    public function destroyPackageMenu(Package $package)
    {
        PackageMenu::where('package_id', $package->id)->where('status', 1)->update(['status' => 0]);
        return redirect()->route('menu.menupaket.index')->with('success', 'Paket Menu berhasil dihapus!');
    }

    //Tambahan 
    public function showLayanan()
    {
        $paket = Package::where('status', 1)->get();
        $wisata = Travel::where('status', 1)->get();
        $kategori = Category::where('status', 1)->get();
        return view('wisata', compact('wisata', 'paket', 'kategori'));
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

