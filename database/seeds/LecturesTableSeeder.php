<?php

use Illuminate\Database\Seeder;

class LecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\factory::create();
        for($i=0;$i<10;$i++)
        {
        	DB::table('lectures')->insert([
        		'group_id'=>$faker->randomElement($array =array(1,2,3,4,5,6,7,8,9,10)),
        		'lecture_title'=>$faker->unique()->name,
                'body' => $faker->name,
        		'created_at'=>\Carbon\Carbon::now(),
          		 'updated_at'=>\Carbon\Carbon::now()
        		]);
        }
    }
}
