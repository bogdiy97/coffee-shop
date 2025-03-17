<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MenuItem;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $menuItemsCount = MenuItem::count();
        $eventsCount = Event::count();

        return view('admin.dashboard', compact('menuItemsCount', 'eventsCount'));
    }

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Datele de autentificare nu sunt corecte.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function editAbout()
    {
        $aboutContent = AboutContent::first();
        return view('admin.about.edit', compact('aboutContent'));
    }

    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
            'photos.*' => 'nullable|image|max:2048', // Max 2MB per image
        ]);

        $aboutContent = AboutContent::first();
        if (!$aboutContent) {
            $aboutContent = new AboutContent();
            $aboutContent->photos = [];
        }

        $aboutContent->content = $validated['content'];

        // Handle photo uploads
        if ($request->hasFile('photos')) {
            $photos = $aboutContent->photos ?? [];

            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('about/photos', 'public');
                $photos[] = $path;
            }

            $aboutContent->photos = $photos;
        }

        // Handle photo removals
        if ($request->has('remove_photos')) {
            $photos = $aboutContent->photos ?? [];
            $newPhotos = [];

            foreach ($photos as $index => $photo) {
                if (!isset($request->remove_photos[$index]) || $request->remove_photos[$index] != '1') {
                    $newPhotos[] = $photo;
                } else {
                    // Delete the file from storage
                    Storage::disk('public')->delete($photo);
                }
            }

            $aboutContent->photos = $newPhotos;
        }

        $aboutContent->save();

        return redirect()->route('admin.about.edit')
            ->with('success', 'Conținutul a fost actualizat cu succes!');
    }
}
