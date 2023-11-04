<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function create()
    {
        return view('settings.create');
    }


    public function edit()
    {
        $settings = Settings::first();

        if ($settings) {
            return view('admin.settings.edit', compact('settings'));
        }

        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif', // Adjust image validation rules
        ]);

        $settings = new Settings;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = 'images'; // Relative to the public directory
            $logo->move(public_path($logoPath), $logo->getClientOriginalName());
            $settings->logo = asset("$logoPath/{$logo->getClientOriginalName()}");
        }

        $settings->title = $request->input('title');
        $settings->save();

        return redirect()->route('settings.create')->with('success', 'Settings created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
        ]);

        $settings = Settings::first();

        if (!$settings) {
            $settings = new Settings();
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = 'images'; // Relative to the public directory
            $logo->move(public_path($logoPath), $logo->getClientOriginalName());
            $settings->logo = asset("$logoPath/{$logo->getClientOriginalName()}");
        }

        $settings->title = $request->input('title');
        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }


}
