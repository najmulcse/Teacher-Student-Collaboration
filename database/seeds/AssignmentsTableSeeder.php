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
        
        	DB::table('assignments')->insert([
        		'post_id'           => 1 ,
        		'last_submit_date'  => $faker->date($format='Y-M-D',$max='now'),
        		'created_at'        => \Carbon\Carbon::now(),
          	'updated_at'        => \Carbon\Carbon::now()
        		
            ]);
        
          DB::table('assignments')->insert([
            'post_id'           => 2 ,
            'last_submit_date'  => $faker->date($format='Y-M-D',$max='now'),
            'created_at'        => \Carbon\Carbon::now(),
            'updated_at'        => \Carbon\Carbon::now()
            
            ]);

            DB::table('assignments')->insert([
              'post_id'           => 3 ,
              'last_submit_date'  => $faker->date($format='Y-M-D',$max='now'),
              'created_at'        => \Carbon\Carbon::now(),
              'updated_at'        => \Carbon\Carbon::now()
              
              ]);
    }
}
