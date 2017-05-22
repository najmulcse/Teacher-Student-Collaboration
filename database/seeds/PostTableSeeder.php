<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $faker=Faker\factory::create();

          // for teachers

        DB::table('posts')->insert([
            'group_id'    => 1,
            'user_id'     => 1,
            'title'       => $faker->name,
            'body'        => $faker->text ,
            'type'        => $faker->randomElement($array =array('L','P')),
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
            ]);
        DB::table('posts')->insert([
            'group_id'    => 2,
            'user_id'     => 2,
            'title'       => $faker->name,
            'body'        => $faker->text ,
            'type'        => $faker->randomElement($array =array('L','P')),
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
            ]);


        //for students

        for($i=0;$i<10;$i++)
        {
        	DB::table('posts')->insert([
        		'group_id'    => $faker->randomElement($array = array(3,4,5,6,7,8,9,10,11,12)),
            'user_id'     => $faker->randomElement($array = array(3,4,5,6,7,8,9,10,11,12)),
            'title'       => $faker->name,
            'body'        => $faker->text ,
            'type'        => $faker->randomElement($array =array('L','P')),
        		'created_at'  => \Carbon\Carbon::now(),
          	'updated_at'  => \Carbon\Carbon::now()
        		]);
        }
    }
}
