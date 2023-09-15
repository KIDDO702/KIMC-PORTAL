<?php

namespace Database\Seeders;

use App\Models\CourseLevel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Diploma',
                'slug' => 'diploma'
            ],
            [
                'name' => 'Certificate',
                'slug' => 'certificate'
            ],
            [
                'name' => 'Upgrade',
                'slug' => 'upgrade'
            ]
        ];

        foreach ($levels as $level) {
            CourseLevel::create($level);
        }
    }
}
