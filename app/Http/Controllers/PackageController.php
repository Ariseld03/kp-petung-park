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
        $packageMenus = PackageMenu::with('menu')->where('package_id', $id)->get();
        $menus = Menu::where('status', 1)->get();
        return view('menu.menupaket.edit', compact('packageMenus', 'menus', 'id')); // Pass $id (package_id) to the view
    }
    
    public function updateMenuPackage(Request $request, $id)
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
            $oldGalleryIds = $request->get('gallery_id');
            $status = $request->get('status');
            $newGalleryIds = $request->get('new_menus', []);
            if (!empty($newGalleryIds)) {
                  // Ensure that the old and new gallery IDs are integers
                    $oldGalleryIds = array_map('intval', $oldGalleryIds);
                    $newGalleryIds = array_map('intval', $newGalleryIds);
    
                    // Step 1: Find the galleries that need to be removed
                    // Remove galleries that are in the old data but not in the new data
                    $galleryIdsToRemove = array_diff($oldGalleryIds, $newGalleryIds);
    
    
                    // Delete the galleries that need to be removed
                    if (!empty($galleryIdsToRemove)) {
                        TravelGallery::where('package_id', $packageId)
                                    ->whereIn('gallery_id', $galleryIdsToRemove)
                                    ->delete();
                    }
    
                    // Step 2: Add the new gallery ids that aren't already in the database
                    $existingGalleryIds = TravelGallery::where('package_id', $packageId)
                                                    ->whereIn('gallery_id', $newGalleryIds)
                                                    ->pluck('gallery_id')
                                                    ->toArray();
    
                    // Find the new gallery IDs that don't exist in the database
                    $filteredNewGalleryIds = array_diff($newGalleryIds, $existingGalleryIds);
    
                // Insert the new gallery records
                foreach ($filteredNewGalleryIds as $galleryId) {
                    TravelGallery::create([
                        'package_id' => $packageId,
                        'gallery_id' => $galleryId,
                        'name_collage' => $nameCollage,
                        'status' => $status,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]);
                }
            } else {
                // If no new photos, update existing records with new details
                TravelGallery::where('package_id', $packageId)
                             ->whereIn('gallery_id', $oldGalleryIds)
                             ->update([
                                 'name_collage' => $nameCollage,
                                 'status' => $status,
                                 'updated_at' => now(),
                             ]);
            }
        
            return redirect()->route('wisata.gallery.index')->with('success', 'Data kolase berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('wisata.gallery.edit', [
                'package_id' => $request->get('package_id'),
                'gallery_id' => $oldGalleryIds
            ])->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

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

