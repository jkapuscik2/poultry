<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('poultry')->insert([
            'name' => "Guinea Fow",
            'photo' => "demo.png",
            'content' => "Guineafowl (/ˈɡɪnifaʊl/; sometimes called \"pet speckled hen\", or \"original fowl\") are birds of the family Numididae in the order Galliformes. They are endemic to Africa and rank among the oldest of the gallinaceous birds."
        ]);
        DB::table('poultry')->insert([
            'name' => "Cochin",
            'photo' => "demo2.png",
            'content' => "The Cochin is a breed of large domestic chicken. It derives from large feather-legged chickens brought from China to Europe and North America in the 1840s and 1850s. It is reared principally for exhibition."
        ]);
        DB::table('poultry')->insert([
            'name' => "Polish chicken",
            'photo' => "demo3.jpg",
            'content' => "The Polish or Poland is a European breed of crested chickens known for its remarkable crest of feathers. The oldest accounts of these birds come from The Netherlands; their exact origins are unknown, however."
        ]);
        DB::table('poultry')->insert([
            'name' => "Polish chicken (white)",
            'photo' => "demo4.jpg",
            'content' => "The Polish or Poland is a European breed of crested chickens known for its remarkable crest of feathers. The oldest accounts of these birds come from The Netherlands; their exact origins are unknown, however."
        ]);
    }
}
