<?php

use Illuminate\Database\Seeder;

class GroupMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<5;$i++){
        DB::table('groupmembers')->insert([
            'group_id'=>$faker->randomElement($array =array(1,2)),
            'user_id'=>$faker->unique()->randomDigit,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()
        ]);
        }
    }
}
