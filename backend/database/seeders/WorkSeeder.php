<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            [
                'order' => 1,
                'type' => 'Bérvágások tömböl',
                'stone_type' => 'Márvány - Mészkő - Homokkő',
                'size' => '',
                'price' => 15000,
            ],
            [
                'order' => 2,
                'type' => 'Bérvágások tömböl',
                'stone_type' => 'Gránit',
                'size' => '2 cm - 6 cm',
                'price' => 19000,
            ],
            [
                'order' => 3,
                'type' => 'Bérvágások tömböl',
                'stone_type' => 'Gránit',
                'size' => '6 cm - 12 cm',
                'price' => 20000,
            ],
            [
                'order' => 4,
                'type' => 'Bérvágások tömböl',
                'stone_type' => 'Gránit',
                'size' => '12 cm - 22 cm',
                'price' => 22000,
            ],
            [
                'order' => 5,
                'type' => 'Tábla utánvágások',
                'stone_type' => '',
                'size' => '0,5 m2 alatt',
                'price' => 28000,
            ],
            [
                'order' => 6,
                'type' => 'Tábla utánvágások',
                'stone_type' => '',
                'size' => '0,5 m2 felett',
                'price' => 20000,
            ],
            [
                'order' => 7,
                'type' => 'Fényezés automata gépen',
                'stone_type' => '',
                'size' => '',
                'price' => 12000,
            ],
            [
                'order' => 8,
                'type' => 'Fényezés karos gépen',
                'stone_type' => '',
                'size' => '',
                'price' => 18000,
            ],
            [
                'order' => 9,
                'type' => 'Széllapok',
                'stone_type' => '',
                'size' => '',
                'price' => 30000,
            ],
            [
                'order' => 10,
                'type' => 'Szélezés',
                'stone_type' => '',
                'size' => '1 cm - 3 cm',
                'price' => 2000,
            ],
            [
                'order' => 11,
                'type' => 'Szélezés',
                'stone_type' => '',
                'size' => '10 cm',
                'price' => 6000,
            ],
            [
                'order' => 12,
                'type' => 'Szélezés',
                'stone_type' => '',
                'size' => '20 cm',
                'price' => 12000,
            ],
        ]);
    }
}
