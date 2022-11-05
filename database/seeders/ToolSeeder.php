<?php

namespace Database\Seeders;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tool= Tool::where('id', '1')->first();
        if (!$tool) {
            $tool = new Tool;
            $tool->name = "ปุ๋ยปรับสภาพดิน";
            $tool->quantity = 20;
            $tool->type = 'fertilizer';
            $tool->save();
        }
        $tool= Tool::where('id', '2')->first();
        if (!$tool) {
            $tool = new Tool;
            $tool->name = "ยาฆ่าหญ้า";
            $tool->quantity = 10;
            $tool->type = 'herbicide';
            $tool->save();
        }
        //Tool::factory(5)->create();
    }
}
