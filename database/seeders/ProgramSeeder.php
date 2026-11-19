<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'code' => 'BSIT',
            'title' => 'Bachelor of Science in Information Technology',
            'description' => 'Focuses on software development, database management, network systems, and modern IT solutions.',
            'image_path' => 'images/program-bsit.jpg',
        ]);

        Program::create([
            'code' => 'BSOA',
            'title' => 'Bachelor of Science in Office Administration',
            'description' => 'Equips students with administrative, clerical, and advanced office management skills for corporate environments.',
            'image_path' => 'images/program-bsoa.jpg',
        ]);

        Program::create([
            'code' => 'BSHM',
            'title' => 'Bachelor of Science in Hospitality Management',
            'description' => 'Trains students in hotel, restaurant, and tourism operations focusing on global hospitality standards.',
            'image_path' => 'images/program-bshm.jpg',
        ]);

        Program::create([
            'code' => 'BSED',
            'title' => 'Bachelor of Secondary Education',
            'description' => 'Prepares future high school educators with specialized knowledge in various teaching major fields.',
            'image_path' => 'images/program-bsed.jpg',
        ]);

        Program::create([
            'code' => 'BEED',
            'title' => 'Bachelor of Elementary Education',
            'description' => 'A teacher education program preparing graduates to shape young minds at the elementary level.',
            'image_path' => 'images/program-beed.jpg',
        ]);
    }
}
