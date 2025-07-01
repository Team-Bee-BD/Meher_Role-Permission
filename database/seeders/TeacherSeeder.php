<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = collect(
            [
                [
                    'name' => 'Meher',
                    'email' => 'meher@gamil.com'
                ],
                [
                    'name' => 'Negar',
                    'email' => 'n@gamil.com'
                ],
                [
                    'name' => 'Auntora',
                    'email' => 'a@gamil.com'
                ]
            ]
        );

        $teachers->each(
            function ($teacher) {
                teacher::insert($teacher);
            }
        );
    }
}
