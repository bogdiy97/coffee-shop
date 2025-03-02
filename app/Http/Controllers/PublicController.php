<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MenuItem;
use App\Models\AboutContent;
use Illuminate\Http\Request;

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

    public function menu(Request $request)
    {
        $category = $request->query('category', 'all');

        $query = MenuItem::query();

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $menuItems = $query->orderBy('category')->get();
        return view('public.menu', compact('menuItems', 'category'));
    }
}
