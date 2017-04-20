<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      
       DB::table('user_types')->insert([
          'user_type'=>'Teacher'
       ]);
        DB::table('user_types')->insert([
          'user_type'=>'Student'

       ]);
         DB::table('user_types')->insert([
          'user_type'=>'Admin'

       ]);
    }    
}
