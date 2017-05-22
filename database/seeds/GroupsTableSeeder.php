<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker= Faker\Factory::create();

           DB::table('groups')->insert([

               'group_name'         => 'Laravel',
               'short_description'  => $faker->text,
               'user_id'            => 1,
               'group_moderator'    => 3,
               'session'            => $faker ->numerify('20##-##'),
               'course_code'        => $faker->numerify('cse-####'),
               'group_code'         => $faker->numerify('group###'),
               'created_at'         => \Carbon\Carbon::now(),
               'updated_at'         => \Carbon\Carbon::now()



           ]);
        DB::table('groups')->insert([
          
            'group_name'           => 'Software Engineering',
            'short_description'    => $faker->text,
            'user_id'              => 2,
            'group_moderator'      => 4,
            'session'              => $faker ->numerify('20##-##'),
            'course_code'          => $faker->numerify('cse-####'),
            'group_code'           => $faker->numerify('group###'),
            'created_at'           => \Carbon\Carbon::now(),
            'updated_at'           => \Carbon\Carbon::now()



        ]);

    }
}
