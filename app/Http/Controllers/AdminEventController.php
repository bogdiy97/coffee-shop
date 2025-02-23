<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photoPath = $request->file('photo')->store('events', 'public');

        Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'photo_path' => $photoPath
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Evenimentul a fost creat cu succes!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($event->photo_path && Storage::disk('public')->exists($event->photo_path)) {
                Storage::disk('public')->delete($event->photo_path);
            }

            $photoPath = $request->file('photo')->store('events', 'public');
            $event->photo_path = $photoPath;
        }

        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->save();

        return redirect()->route('admin.events.index')
            ->with('success', 'Evenimentul a fost actualizat cu succes!');
    }

    public function destroy(Event $event)
    {
        if ($event->photo_path && Storage::disk('public')->exists($event->photo_path)) {
            Storage::disk('public')->delete($event->photo_path);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Evenimentul a fost șters cu succes!');
    }
}
