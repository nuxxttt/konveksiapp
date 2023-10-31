<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data = $request->all();

        // Hash the password
        $data['password'] = Hash::make($data['password']);
        $data['role'] = "admin";

        Profile::create($data);

        return redirect()->route('profile.index')->with('success', 'Profile created successfully.');

    }


    public function show($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile.show', compact('profile'));
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required', // Add validation for the "role" field
        ]);

        $profile = Profile::find($id);
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->role = $request->input('role');

        // Hash the password only if it's provided in the request
        if ($request->has('password')) {
            $hashedPassword = Hash::make($request->input('password'));
            $profile->password = $hashedPassword;
        }

        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }


    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus.');
    }

}
