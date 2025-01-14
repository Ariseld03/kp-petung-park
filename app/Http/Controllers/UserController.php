<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gallery;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = User::all();
        return view('staf.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $galleries = Gallery::where('status', 1)->get();
        return view('staf.add', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'password' => 'required|string',
                'date_of_birth' => 'required|date',
                'phone_number' => 'required|string|max:15',
                'position' => 'required|string',
                'gender' => 'required|string',
                'email' => 'required|email',
                'photo' => 'nullable|integer|exists:galleries,id',
            ]);
            $staff = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'status' => 1,
                'password' => bcrypt($request->input('password')),
                'date_of_birth' => $request->input('date_of_birth'),
                'phone_number' => $request->input('phone_number'),
                'position' => $request->input('position'),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
            ];

            if ($request->has('photo')) {
                $staff['gallery_id'] = $request->input('photo');
            }
    
            $user = new User($staff);
            $user->save();

            return redirect()->route('staf.index')->with('success', 'Staf berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat input data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function showAdminPage()
    {
        return view('admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff = User::where('id', $id)->first();
        if (!$staff) {
            return redirect()->route('staf.index')->with('error', 'Staff not found');
        }
        $galleries = Gallery::where('status', 1)
                            ->where('id', '!=', $staff->gallery_id)
                            ->get();
        return view('staf.edit', compact('staff', 'galleries'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
{
    try {
        $staff = User::findOrFail($user);

        // Validate the input
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'position' => 'required|string',
            'gender' => 'required|string',
            'status' => 'required|boolean',
            'old_photo' => 'nullable|integer|exists:galleries,id',
            'new_photo' => 'nullable|integer|exists:galleries,id',
            'oldPassword' => 'nullable|required_if:changePassword,on',
            'newPassword' => 'nullable|required_if:changePassword,on|confirmed',
        ]);

        // Update basic details
        $staff->email = $validated['email'];
        $staff->name = $validated['name'];
        $staff->date_of_birth = $validated['date_of_birth'];
        $staff->phone_number = $validated['phone_number'];
        $staff->position = $validated['position'];
        $staff->gender = $validated['gender'];
        $staff->status = $validated['status'];

        // Handle password change
        if ($request->has('changePassword')) {
            if (Hash::check($validated['oldPassword'], $staff->password)) {
                $staff->password = bcrypt($validated['newPassword']);
            } else {
                return back()->withErrors(['oldPassword' => 'Password lama salah.']);
            }
        }

        // Handle photo change
        if ($request->has('new_photo')) {
            if ($request->input('old_photo') != $request->input('new_photo')) {
                $staff->gallery_id = $request->input('new_photo');
            }
        }

        // Save changes
        $staff->save();

        return redirect()->route('staf.index')->with('success', 'Data staff berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = User::findOrFail($id);
        $staff->status = 0;
        $staff->save();

        return redirect()->route('staf.index')->with('success', 'Staf berhasil dihapus!');
    }
}
