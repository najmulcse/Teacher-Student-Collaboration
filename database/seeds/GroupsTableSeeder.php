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
               'group_name'=>'Laravel',
               'short_description'=>$faker->text,
               'group_admin'=>1,
               'group_moderator'=>3,
               'created_at'=>\Carbon\Carbon::now(),
               'updated_at'=>\Carbon\Carbon::now()



           ]);
        DB::table('groups')->insert([
            'group_name'=>'Software Engineering',
            'short_description'=>$faker->text,
            'group_admin'=>2,
            'group_moderator'=>4,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()



        ]);

    }
}
