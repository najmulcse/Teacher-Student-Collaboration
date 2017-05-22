<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for ($i=0;$i<5;$i++){
        DB::table('students')->insert([

            'user_id'       => $faker->unique()->randomDigit,
            'roll'          => random_int(00005400,90905490),
            'year'          => $faker->randomElement($array = array('1st','2nd','3rd','4th')),
            'semester'      => $faker->randomElement($array = array('1st','2nd')),
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
        ]);
        }
    }
}
