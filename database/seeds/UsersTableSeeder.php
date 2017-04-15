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
      
      $faker = Faker\Factory::create();
      for ($i=0;$i<10;$i++){
       DB::table('users')->insert([
          'name'=>$faker->name,
           'email'=>'student'.$i.'@gmail.com',
           'password'=>bcrypt('123456'),
           'user_type_id'=>2,
           'gender'=>$faker->randomElement($array = array ('Male','Female')),
           'created_at'=>\Carbon\Carbon::now(),
           'updated_at'=>\Carbon\Carbon::now()

       ]);
       }

    }
}
