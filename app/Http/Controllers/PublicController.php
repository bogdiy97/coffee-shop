<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MenuItem;
use App\Models\AboutContent;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function events()
    {
        $events = Event::latest()->get();
        return view('public.events', compact('events'));
    }

    public function about()
    {
        $aboutContent = AboutContent::first();
        return view('public.about', compact('aboutContent'));
    }

    public function menu()
    {
        $menuItems = MenuItem::orderBy('category')->get();
        return view('public.menu', compact('menuItems'));
    }
}
