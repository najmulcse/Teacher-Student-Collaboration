<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker =Faker\Factory::create();

        for ($i=0;$i<4;$i++){
        DB::table('teachers')->insert([

           'user_id'        => $faker->unique()->randomDigit,
           'designation'    => $faker->randomElement( $array = array('Professor','Lecturer','Assistant professor')),
           'created_at'     => \Carbon\Carbon::now(),
           'updated_at'     => \Carbon\Carbon::now()
        ]);
        }
    }
}
