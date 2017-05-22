<?php

use Illuminate\Database\Seeder;

class AssignmentsTableSeeder extends Seeder
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
        	DB::table('assignments')->insert([
        		'group_id'          => $faker->randomElement($array =array(1,2,3,4,5,6,7,8,9,10)),
        		'assignment_title'  => $faker->unique()->name,
            'body'              => $faker->text ,
        		'last_submit_date'  => $faker->date($format='Y-M-D',$max='now'),
        		'created_at'        => \Carbon\Carbon::now(),
          	'updated_at'        => \Carbon\Carbon::now()
        		
            ]);
        }
    }
}
