<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(GroupsTableSeeder::class);
         $this->call(GroupMembersTableSeeder::class);
         $this->call(TeachersTableSeeder::class);
         $this->call (StudentsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(UserTypeTableSeeder::class);
         $this->call(LecturesTableSeeder::class);
         $this->call(AssignmentsTableSeeder::class);
         $this->call(ContentsTableSeeder::class);
    }
}
