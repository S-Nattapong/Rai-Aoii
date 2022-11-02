<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@example.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Administrator S.";
            $user->role = 'ADMIN';
            $user->email = 'admin@example.com';
            $user->password = Hash::make('adminpass');
            $user->id_cardcode = "1234567890123";
            $user->phone_no = "081-234-5678";
            $user->address = "Bangkok";
            $user->save();
        }

        $user = User::where('email', 'staff01@example.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Editar L.";
            $user->role = 'STAFF';
            $user->email = 'staff01@example.com';
            $user->password = Hash::make('staffpass');
            $user->organization_id = "1";
            $user->id_cardcode = "1233333333333";
            $user->phone_no = "071-234-5678";
            $user->address = "Bangkok";
            $user->save();
        }

        $user = User::where('email', 'user01@example.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "ยูสเซอร์ 01";
            $user->role = 'USER';
            $user->email = 'user01@example.com';
            $user->password = Hash::make('userpass');
            $user->id_cardcode = "2221234567890";
            $user->phone_no = "061-234-5678";
            $user->address = "Bangkok";
            $user->save();
        }

        User::factory(1)->create();
    }
}
