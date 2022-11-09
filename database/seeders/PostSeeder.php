<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post= Post::where('id', '1')->first();
        if (!$post) {
            $post = new Post;
            $post->title = "ข้อเสนอจากโรงน้ำตาล";
            $post->desired = Carbon::yesterday();
            $post->quantity = 5;
            $post->deal_money = 5000;
            $post->deposit_money = 2500;
            $post->status = "Waiting";
            $post->user_id = 2;
            $post->save();
        }

    }
}
