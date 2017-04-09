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
        DB::table('groupmembers')->insert([
            'group_id'=>1,
            'user_id'=>random_int(1,10),
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()
        ]);
    }
}
