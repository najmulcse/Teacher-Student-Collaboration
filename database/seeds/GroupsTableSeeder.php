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
       DB::table('groups')->insert([
           'group_name'=>str_random(10),
           'short_description'=>str_random(20),
           'group_admin'=>1,
           'group_moderator'=>2,
           'created_at'=>\Carbon\Carbon::now(),
           'updated_at'=>\Carbon\Carbon::now()



       ]);
    }
}
