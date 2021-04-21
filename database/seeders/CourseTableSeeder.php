<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //::
    	Course::create(['title'=>'Learning','description'=>'Learning']);
    	Course::create(['title'=>'Math','description'=>'Learning']);
    	

    }
}
