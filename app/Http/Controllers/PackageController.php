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
        $packages = Package::all();
        return view('menu.paket.index', compact('packages'));
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
    public function indexMenuPackage(){
        $packagemenus = PackageMenu::with('menu')->get();
        return view('menu.menupaket.index', compact('packagemenus'));
    }
    public function addMenuPackage()
    {
        $packages = Package::where('status', 1)->get();
        $menus = Menu::where('status', 1)->get();
        return view('menu.menupaket.add', compact('packages', 'menus'));
    }

    public function storeMenuPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menus' => 'required|array', 
            'menus.*' => 'integer|exists:menus,id', 
            'package_id' => 'required|integer|exists:packages,id',
        ]);

        $existingMenus = PackageMenu::where('package_id', $request->package_id)
                                    ->pluck('menu_id')
                                    ->toArray();

        $newMenus = array_diff($request->menus, $existingMenus);

        if (count($newMenus) == 0) {
            return redirect()->back()->with('error', 'Data sudah ada!');
        }

        foreach ($newMenus as $menuId) {
            PackageMenu::create([
                'menu_id' => $menuId,
                'package_id' => $request->package_id,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('menu.menupaket.index')->with('success', 'Paket Menu berhasil ditambahkan.');
    }   
    public function editMenuPackage($id)
    {
        $packageMenus = PackageMenu::with(['package','menu'])->where('package_id', $id)->get();
        $menus = Menu::where('status', 1)->get();
        return view('menu.menupaket.edit', compact('packageMenus', 'menus', 'id'));
    }
    
    public function updateMenuPackage(Request $request, $packagemenu)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required|array', 
            'menu_id.*' => 'integer|exists:menus,id', 
            'package_id' => 'required|integer|exists:packages,id',
            'status' => 'required|integer',
            'new_menus' => 'nullable|array',
            'new_menus.*' => 'integer|exists:menus,id',
        ]);

        try {
            $packageId = $request->get('package_id');
            $oldMenuIds = $request->get('menu_id');
            $status = $request->get('status');
            $newMenuIds = $request->get('new_menus', []);
            if (!empty($newMenuIds)) {
                  // Ensure that the old and new Menu IDs are integers
                    $oldMenuIds = array_map('intval', $oldMenuIds);
                    $newMenuIds = array_map('intval', $newMenuIds);
    
                    // Step 1: Find the galleries that need to be removed
                    // Remove galleries that are in the old data but not in the new data
                    $menuIdsToRemove = array_diff($oldMenuIds, $newMenuIds);
    
    
                    // Delete the galleries that need to be removed
                    if (!empty($menuIdsToRemove)) {
                        PackageMenu::where('package_id', $packageId)
                                    ->whereIn('menu_id', $menuIdsToRemove)
                                    ->delete();
                    }
    
                    // Step 2: Add the new Menu ids that aren't already in the database
                    $existingMenuIds = PackageMenu::where('package_id', $packageId)
                                                    ->whereIn('menu_id', $newMenuIds)
                                                    ->pluck('menu_id')
                                                    ->toArray();
    
                    // Find the new Menu IDs that don't exist in the database
                    $filteredNewMenuIds = array_diff($newMenuIds, $existingMenuIds);
    
                foreach ($filteredNewMenuIds as $menuId) {
                    PackageMenu::create([
                        'package_id' => $packageId,
                        'menu_id' => $menuId,
                        'status' => $status,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]);
                }
            } else {
                PackageMenu::where('package_id', $packageId)
                             ->whereIn('menu_id', $oldMenuIds)
                             ->update([
                                 'status' => $status,
                                 'updated_at' => now(),
                             ]);
            }
        
            return redirect()->route('menu.menupaket.index')->with('success', 'Data kolase berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('menu.menupaket.edit', [
                'packagemenu' => $packagemenu,
                'package_id' => $request->get('package_id'),
                'menu_id' => $oldMenuIds
            ])->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->route('menu.menupaket.index')->with('success', 'Paket Menu berhasil diupdate.');
    }

    public function deleteMenuPackage($packageMenu)
    {
        PackageMenu::where('package_id', $packageMenu)->where('status', 1)->update(['status' => 0]);
        return redirect()->route('menu.menupaket.index')->with('success', 'Paket Menu berhasil dinonaktifkan!');
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

