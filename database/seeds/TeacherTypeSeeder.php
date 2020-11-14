<?php

use App\Models\TeacherType;
use Illuminate\Database\Seeder;
class TeacherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TeacherType::class, 5)->create();
    }
}
