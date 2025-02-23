<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $defaultImage = 'menu/default-menu-item.jpg';

        // Create menu directory if it doesn't exist
        if (!Storage::disk('public')->exists('menu')) {
            Storage::disk('public')->makeDirectory('menu');
        }

        $menuImages = collect(Storage::disk('public')->files('menu'))
            ->filter(function($path) {
                return Storage::disk('public')->exists($path);
            })
            ->values()
            ->shuffle();

        $menuItems = [
            [
                'name' => 'Espresso Clasic',
                'description' => 'O doză concentrată de espresso, bogată în aromă și intensă în gust',
                'price' => 12.99,
                'photo_path' => $menuImages->isNotEmpty() ? $menuImages->shift() : $defaultImage,
                'category' => 'cafea'
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Espresso cu spumă de lapte și un strop de pudră de cacao',
                'price' => 15.99,
                'photo_path' => $menuImages->isNotEmpty() ? $menuImages->shift() : $defaultImage,
                'category' => 'cafea'
            ],
            [
                'name' => 'Matcha Latte',
                'description' => 'Ceai verde matcha premium din Japonia cu lapte cald',
                'price' => 18.99,
                'photo_path' => $menuImages->isNotEmpty() ? $menuImages->shift() : $defaultImage,
                'category' => 'specialitate'
            ],
            [
                'name' => 'Ciocolată Caldă',
                'description' => 'Ciocolată belgiană topită în lapte cald și cremos',
                'price' => 16.99,
                'photo_path' => $menuImages->isNotEmpty() ? $menuImages->shift() : $defaultImage,
                'category' => 'băuturi'
            ],
            [
                'name' => 'Croissant cu Unt',
                'description' => 'Croissant proaspăt, crocant și pufos, copt zilnic în brutăria noastră',
                'price' => 8.99,
                'photo_path' => $menuImages->isNotEmpty() ? $menuImages->shift() : $defaultImage,
                'category' => 'patiserie'
            ],
            [
                'name' => 'Caramel Latte Rece',
                'description' => 'Espresso cu lapte rece și sirop de caramel, servit cu gheață',
                'price' => 17.99,
                'photo_path' => $menuImages->isNotEmpty() ? $menuImages->shift() : $defaultImage,
                'category' => 'cafea'
            ]
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}
