<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            $user = new User();
            $user->name            = 'admin';
            $user->email           = 'admin@admin.com';
            $user->password        = bcrypt('123456789');  //token : 2|m9Zx8FY9cKLTLiUOf3daY6y7RyzK2UrunCXRdJrO
            $user->remember_token = 'fM4FMEOEdS';
            $user->save();
    }
}
