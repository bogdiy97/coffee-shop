<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $eventImages = collect(Storage::disk('public')->files('events'))
            ->filter(function($path) {
                return Storage::disk('public')->exists($path);
            })
            ->values()
            ->shuffle();

        if ($eventImages->isEmpty()) {
            Storage::disk('public')->makeDirectory('events');
        }

        $defaultImage = 'events/default-event.jpg';

        $events = [
            [
                'title' => 'Workshop de Degustare a Cafelei',
                'description' => 'Alătură-te bariștilor noștri experți pentru o seară de degustare a cafelei. Învață despre diferite origini ale cafelei, tehnici de prăjire și metode de preparare. Perfect pentru pasionații de cafea!',
                'photo_path' => $eventImages->isNotEmpty() ? $eventImages->shift() : $defaultImage
            ],
            [
                'title' => 'Seară de Muzică Live',
                'description' => 'Bucură-te de interpretări acustice ale artiștilor locali în timp ce savurezi cafeaua preferată. În fiecare vineri seara, între orele 19:00 și 21:00.',
                'photo_path' => $eventImages->isNotEmpty() ? $eventImages->shift() : $defaultImage
            ],
            [
                'title' => 'Workshop de Latte Art',
                'description' => 'Învață bazele artei latte de la bariștii noștri talentați. Creează modele frumoase în cafea, precum inimi, rozete și multe altele!',
                'photo_path' => $eventImages->isNotEmpty() ? $eventImages->shift() : $defaultImage
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
