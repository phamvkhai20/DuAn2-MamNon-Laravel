<?php

use App\Teacher;
use Illuminate\Database\Seeder;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Teacher::class, 5)->create();
    }
}
