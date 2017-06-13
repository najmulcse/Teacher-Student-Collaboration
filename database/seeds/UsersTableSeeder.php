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
      
      //for admin

      DB::table('users')->insert([

         'name'          => 'Admin1',
         'email'         => 'admin1@gmail.com',
         'password'      => bcrypt('admin1'),
         'user_type_id'  => 3,
         'gender'        => $faker->randomElement($array = array ('Male','Female')),
         'created_at'    => \Carbon\Carbon::now(),
         'updated_at'    => \Carbon\Carbon::now()

      ]);
      //for teachers
       DB::table('users')->insert([

          'name'          => 'Teacher 1',
          'email'         => 'teacher1@gmail.com',
          'password'      => bcrypt('123456'),
          'user_type_id'  => 1,
          'gender'        => $faker->randomElement($array = array ('Male','Female')),
          'created_at'    => \Carbon\Carbon::now(),
          'updated_at'    => \Carbon\Carbon::now()

       ]);
       DB::table('users')->insert([

          'name'          => 'Teacher 2',
          'email'         => 'teacher2@gmail.com',
          'password'      => bcrypt('123456'),
          'user_type_id'  => 1,
          'gender'        => $faker->randomElement($array = array ('Male','Female')),
          'created_at'    => \Carbon\Carbon::now(),
          'updated_at'    => \Carbon\Carbon::now()

       ]);

       //for students

      for ($i=3;$i<=10;$i++){
       DB::table('users')->insert([

          'name'          => $faker->name,
          'email'         => 'student'.$i.'@gmail.com',
          'password'      => bcrypt('123456'),
          'user_type_id'  => 2,
          'gender'        => $faker->randomElement($array = array ('Male','Female')),
          'created_at'    => \Carbon\Carbon::now(),
          'updated_at'    => \Carbon\Carbon::now()

       ]);
       

                 }
  }
}
