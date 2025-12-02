<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stones')->insert([
            // Anyagtár - Gránit
            [
                'order' => 1,
                'name' => 'African Red',
                'origin' => 'Dél-Afrika',
                'color' => 'Homogén vörös, fekete pikkelyekkel',
                'image_url' => '/storage/stones/anyagtar-granit1.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 2,
                'name' => 'Aurora Indian',
                'origin' => 'India',
                'color' => 'Sötétbarna alapon, erőteljes vörösesbarna erekkel',
                'image_url' => '/storage/stones/anyagtar-granit2.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 3,
                'name' => 'Baltic Brown',
                'origin' => 'Finnország',
                'color' => 'Homogén barna foltokkal, bézs pöttyökkel',
                'image_url' => '/storage/stones/anyagtar-granit3.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 4,
                'name' => 'Baltic Green',
                'origin' => 'Finnország',
                'color' => 'Homogén sötétzöld alapon, egreszöld pikkelyekkel',
                'image_url' => '/storage/stones/anyagtar-granit4.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 5,
                'name' => 'Bararp',
                'origin' => 'Svédország',
                'color' => 'Homogén barna, fekete haránt csíkokkal',
                'image_url' => '/storage/stones/anyagtar-granit5.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 6,
                'name' => 'Bros Blue',
                'origin' => 'India',
                'color' => 'Homogén fekete alapon, topázkék pikkelyekkel',
                'image_url' => '/storage/stones/anyagtar-granit6.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 7,
                'name' => 'Crema Bordeaux',
                'origin' => 'Brazília',
                'color' => 'Homogén pasztel mályva, bézs jódbarna, mozgalmas ekkel',
                'image_url' => '/storage/stones/anyagtar-granit7.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 8,
                'name' => 'Emerald Black',
                'origin' => 'Norvégia',
                'color' => 'Homogén sötétszürke alapon, holdezüst apró pikkelyekkel',
                'image_url' => '/storage/stones/anyagtar-granit8.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 9,
                'name' => 'Giallo Ornamentale',
                'origin' => 'Brazília',
                'color' => 'Homogén csontfehér alapon, drapp, bézs szemcsékkel',
                'image_url' => '/storage/stones/anyagtar-granit9.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 10,
                'name' => 'Giallo Veneziano Fiorito',
                'origin' => 'Brazília',
                'color' => 'Homogén sárga, bézs fekete kontúros pikkelyekkel',
                'image_url' => '/storage/stones/anyagtar-granit10.jpg',
                'group' => 'anyagtar-granit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
