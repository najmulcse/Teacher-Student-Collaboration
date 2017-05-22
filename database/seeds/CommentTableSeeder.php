<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
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
        	DB::table('comments')->insert([
        		'post_id'     =>  $faker->randomElement($array =array(1,2,3,4,5,6,7,8,9,10)),
        		'group_id'	  =>  $faker->randomElement($array =array(1,2,3,4,5,6,7.8,9,10)),
        		'user_id'	  =>  $faker->randomElement($array =array(1,2,3,4,5,6,7,8)),
        		'comment'     =>  $faker->text,
        		'created_at'  =>  \Carbon\Carbon::now(),
          		'updated_at'  =>  \Carbon\Carbon::now()
        		]);
        }
    }
}
