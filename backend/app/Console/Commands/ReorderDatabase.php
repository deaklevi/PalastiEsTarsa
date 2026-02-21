<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Stone;
use App\Models\Tombstone;
use App\Models\Work;
use App\Models\Architecture;
use App\Models\Accessory;

class ReorderDatabase extends Command
{
    protected $signature = 'db:reorder';
    protected $description = 'Újraszámozza az elemeket. Ha van group mező, akkor csoportonként, ha nincs, akkor globálisan.';

    public function handle()
    {
        $models = [
            Tombstone::class,
            Stone::class,
            Work::class,
            Architecture::class,
            Accessory::class,
        ];

        foreach ($models as $modelClass) {
            $tableName = (new $modelClass)->getTable();
            $this->info("Feldolgozás: " . class_basename($modelClass));

            // Ellenőrizzük, van-e group oszlop a táblában
            if (Schema::hasColumn($tableName, 'group')) {
                $groups = $modelClass::select('group')->distinct()->pluck('group');

                foreach ($groups as $group) {
                    $this->line("  -> Group: " . ($group ?? 'NULL') . " újraszámozása...");
                    $this->reorderQuery($modelClass::where('group', $group));
                }
            } else {
                // Ha nincs group oszlop, az egész táblát egyszerre rendezzük
                $this->line("  -> Globális újraszámozás (nincs group mező)...");
                $this->reorderQuery($modelClass::query());
            }
        }

        $this->info('Kész! Minden sorrend helyreállítva.');
    }

    private function reorderQuery($query)
    {
        $items = $query->orderBy('order')->orderBy('id')->get();

        DB::transaction(function () use ($items) {
            foreach ($items as $index => $item) {
                // Csak akkor frissítünk, ha szükséges, hogy kíméljük az adatbázist
                $newOrder = $index + 1;
                if ($item->order !== $newOrder) {
                    $item->update(['order' => $newOrder]);
                }
            }
        });
    }
}