<?php

namespace Database\Seeders;
use App\Models\Tool;
use App\Models\History;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $history= History::where('id', '1')->first();
        if (!$history) {
            $history = new History;
            $history->tool_id = 1;
            $history->current_quantity = 20;
            $history->old_quantity = 0;
            $history->status = "Create";
            $history->description = "ถูกสร้างมาใหม่";
            $history->save();
        }
        $history= History::where('id', '2')->first();
        if (!$history) {
            $history = new History;
            $history->tool_id = 2;
            $history->current_quantity = 10;
            $history->old_quantity = 0;
            $history->status = "Create";
            $history->description = "ถูกสร้างมาใหม่";
            $history->save();
        }
    }
}
