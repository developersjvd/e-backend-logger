<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal_access_tokens')->insert(
            [
                'id' => 1,
                'tokenable_type' => 'App\Models\User',
                'tokenable_id' => 1,
                'name' => 'dc',
                'token' => 'b1576c30ab9f27ac35f4ad613bfef9cc4f55b0d6f179f13eacf15593937c782a',
                'abilities' => '["*"]',
                'created_at' => '2022-08-05 17:57:10',
                'updated_at' => '2022-08-05 17:57:10',

            ],
            
        );

        DB::table('aplications')->insert(
            [
                'id' => 1,
                'name' => 'Scale_app',
              

            ],
            
        );

        DB::table('authorizations')->insert(
            [
                'id' => 1,
                'application_id' => 1,
                'token' => 'b1576c30ab9f27ac35f4ad613bfef9cc4f55b0d6f179f13eacf15593937c782a',

            ],
            
        );



        DB::table('logs')->insert(
            [
                'id' => 1,
                'application_id' => 1,
                'type' => 'error',
                'priority' => 'lowest',
                'path' => 'b1576c30ab9f27',
                'message' => 'The provided credentials are incorrect',
                'request' => '{"opening":"Sicilian","variations":["pelikan","dragon","najdorf"]}',
                'response' => '{"opening":"True"}',
                'created_at' => '2022-08-05 17:57:10',
                'updated_at' => '2022-08-05 17:57:10',

            ],
            
        );
    


}

}
