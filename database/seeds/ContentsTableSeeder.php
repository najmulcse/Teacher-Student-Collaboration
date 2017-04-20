<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
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
        	DB::table('contents')->insert([
        		'lecture_or_assignment_id'=>$faker->randomElement($array =array(1,2,3,4,5,6,7,8,9,10)),
        		'content'=>$faker->name ,
        		'content_type'=>$faker->randomElement($array =array('L','A')),
        		'created_at'=>\Carbon\Carbon::now(),
          		 'updated_at'=>\Carbon\Carbon::now()
        		]);
        }
    }
}
