<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuplaTombstoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dupla_tombstones')->insert([
             // Dupla sírkő 1. csoport
            [
                'order' => 1,
                'tombstone_id' => 'D 74',
                'name' => 'gránit Rosa Beta',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 18cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, mellyen van egy mécses tartó és bronz váza. A 10cm magas lépcsőre, csúcsos tetejű és íves oldalú emlék készült, minimal stílusban, fekete felirattal és kereszttel.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D74.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 2,
                'tombstone_id' => 'D 3',
                'name' => 'gránit Verde San Francisco',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 18cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, mellyen van egy sűllyesztett váza és egy natur mart rózsa motívum. A 10cm magas lépcsőre, fekvő hasáb emlék készült lecsapott sarkokkal, minimal stílusban, relief felirattal és porcelán fényképpel.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D3.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 3,
                'tombstone_id' => 'D 103',
                'name' => 'gránit Rosa Beta',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 18cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, mellyen van 2db mécses tartó. A 10cm magas faragott lépcsőre naturisztikus, faragott és amorf formájú emlék készült, fekete felirattal és kereszttel.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D103.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 4,
                'tombstone_id' => 'D 96',
                'name' => 'gránit Paradiso Classico',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 18cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, mellyen van 2db gránit fózolt váza. A 10cm magas lépcsőre, fekvő hasáb emlék készült lecsapott sarkokkal, minimal stílusban, arany felirattal.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D96.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 5,
                'tombstone_id' => 'D 82',
                'name' => 'gránit Nero Impala',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 20cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet. Az emlék amorf formájú, sprengelt, szakított oldallal készült, lézergravírozott portréval és aranyozott karakterekkel.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D82.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 6,
                'tombstone_id' => 'D 46',
                'name' => 'gránit Verde San Francisco',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 20cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet. Az emlék formája szimetrikus, egyenes oldalakkal és íves tetővel.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D46.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 7,
                'tombstone_id' => 'D 2',
                'name' => 'gránit Rosa Beta',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 18cm magas magasítás. A három darabból álló fedlapok középső eleme 5cm, az oldalsó fedlapok 3cm vastagságúak. Az áthidaló lépcsőn van egy kis lépcső és két darab sűllyesztett bronz váza. A trapéz alakú emlék minimal stílusban készült arany felirattal és kereszttel.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D2.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 8,
                'tombstone_id' => 'D 5',
                'name' => 'gránit Red Gaby',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 18cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, mellyen van két darab bronz sűllyesztett váza. A 10cm magas lépcsőre, trapéz alakú emlék készült, minimal stílusban, arany felirattal.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D5.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 9,
                'tombstone_id' => 'D 69',
                'name' => 'gránit Rosa Beta',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 17cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, mellyen van két sűllyesztett váza. A 10cm magas lépcsőre, fekvő hasáb alakú emlék készült, minimal stílusban, fekete felirattal.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D69.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 10,
                'tombstone_id' => 'D 73',
                'name' => 'gránit Rosa Beta',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 30cm-ről 25cm-re lejtős magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, amire került a bronz felirat és két darab sűllyesztett bronz váza.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D73.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 11,
                'tombstone_id' => 'D 58',
                'name' => 'gránit Juparana',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van 20cm magas magasítás. A két darabból álló 3cm vtg. nagyfedlap lezárja a keretet, mellyen van két sűllyesztett váza. A fedlapra helyeztük a "fejpárnát", amire kerül a felirat. Javasolt a bronz vagy a natur karakter.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D58.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => 12,
                'tombstone_id' => 'D 97',
                'name' => 'gránit Nero Assoluto India',
                'description' => 'Mobil (bontható) alapozással készült műkő járdaszegélyen van gránit járdaburkolat és 20cm magas magasítás. A két darabból álló 5cm vtg. nagyfedlap lezárja a keretet, mellyen van a relief felirat. A járdára helyeztük a nagyméretű gránit vázát.',
                'image_url' => '/storage/tombstones/dupla_tombstones/D97.jpg',
                'group' => 'Dupla sírkő 1. csoport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
