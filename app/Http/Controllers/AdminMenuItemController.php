<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::orderBy('category')->get();
        return view('admin.menu-items.index', compact('menuItems'));
    }

    public function create()
    {
        return view('admin.menu-items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:cafea,băuturi,patiserie,specialitate',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photoPath = $request->file('photo')->store('menu', 'public');

        MenuItem::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'],
            'photo_path' => $photoPath
        ]);

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Produsul a fost adăugat cu succes!');
    }

    public function edit(MenuItem $menuItem)
    {
        return view('admin.menu-items.edit', compact('menuItem'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:cafea,băuturi,patiserie,specialitate',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            if ($menuItem->photo_path && Storage::disk('public')->exists($menuItem->photo_path)) {
                Storage::disk('public')->delete($menuItem->photo_path);
            }

            $photoPath = $request->file('photo')->store('menu', 'public');
            $menuItem->photo_path = $photoPath;
        }

        $menuItem->name = $validated['name'];
        $menuItem->description = $validated['description'];
        $menuItem->price = $validated['price'];
        $menuItem->category = $validated['category'];
        $menuItem->save();

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Produsul a fost actualizat cu succes!');
    }

    public function destroy(MenuItem $menuItem)
    {
        if ($menuItem->photo_path && Storage::disk('public')->exists($menuItem->photo_path)) {
            Storage::disk('public')->delete($menuItem->photo_path);
        }

        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Produsul a fost șters cu succes!');
    }
}
