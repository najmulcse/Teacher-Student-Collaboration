<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
          'name'=>str_random(6),
           'email'=>str_random(4).'@gmail.com',
           'password'=>bcrypt('123456'),
           'user_type_id'=>2,
           'gender'=>'Male',
           'created_at'=>\Carbon\Carbon::now(),
           'updated_at'=>\Carbon\Carbon::now()

       ]);

    }
}
