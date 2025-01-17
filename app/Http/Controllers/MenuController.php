<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        $menus= Menu::all();
        return view('menu.index', compact('packages','menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        $categories = Category::where('status', 1)->get();
        $users = User::where('status', 1)->get();
        $galleries = Gallery::where('status', 1)->get();
        return view('menu.hidangan.create', compact('categories', 'users', 'galleries'));
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
            'recommendation' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|email|exists:users,id',
            'gallery_id' => 'required|integer|exists:galleries,id',
        ]);
        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => 1,
            'status_recommended' => $request->recommendation,
            'number_love' => 0,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'gallery_id' => $request->gallery_id,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.hidangan.show', compact('menu'));
    }

    public function showMenuAllPengguna()
    {
        $menus = Menu::where('status', 1)->get();
        return view('menu.hidangan.show', compact('menus'));
    }

    public function cariMenuDariId($id)
    {
        $menu = Menu::with('category')
                    ->findOrFail($id);
    
        return view('menu.hidangan.show', compact('menu'));
    }

    public function like(Request $request, $menuId)
    {
        $menu = Menu::findOrFail($menuId);
        $sessionKey = 'liked_menu_' . $menuId;
    
        if (session()->has($sessionKey)) {
            if($menu->number_love==0){
                $menu->number_love=0;
            }
            else{
                $menu->number_love--;
            }
            session()->forget($sessionKey);
        } else {
            $menu->number_love++;
            session()->put($sessionKey, true);
        }
    
        $menu->save();
    
        return response()->json(['number_love' => $menu->number_love]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $users = User::where('status', 1)->get();
        $galleries = Gallery::where('status', 1)->get();
        return view('menu.hidangan.edit', compact('menu', 'categories', 'users', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|integer|in:1,0',
            'recommendation' => 'required|integer',
            'number_love' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id',
            'gallery_id' => 'required|integer|exists:galleries,id',
        ]);
    
        $menu = Menu::findOrFail($id);
    
        // Update menu fields first
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'status_recommended' => $request->recommendation,
            'number_love' => $request->number_love,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'gallery_id' => $request->gallery_id,
            'update_date' => now(),
        ]);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil Diupdate!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->status=0;
        $menu->save();
        return redirect()->route('menu.index')->with('success', true);
    }
}

