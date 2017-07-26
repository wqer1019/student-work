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
        DB::table('departments')->truncate();
        DB::table('work_types')->truncate();
        DB::table('colleges')->truncate();
        DB::table('assess')->truncate();
        DB::table('semesters')->truncate();

        $this->call(DepartmentsSeeder::class);
        $this->call(WorkTypesSeeder::class);
        $this->call(CollegesSeeder::class);
        $this->call(AssessSeeder::class);
        $this->call(SemestersSeeder::class);
    }
}
