<?php

namespace Database\Seeders;
use App\Models\Order;
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
        History::factory(5)->create();
    }
}
