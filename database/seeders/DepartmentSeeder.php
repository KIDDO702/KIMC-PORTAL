<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Engineering',
                'slug' => 'engineering',
                'type' => 0,
                'location' => 'Annex',
                'contact' => 'engineering@kimc.ac.ke',
                'featured' => 0
            ],
            [
                'name' => 'Information Training',
                'slug' => 'information-training',
                'type' => 0,
                'location' => 'Info Area',
                'contact' => 'infodept@kimc.ac.ke',
                'featured' => 0
            ],
            [
                'name' => 'Film Training',
                'slug' => 'film-training',
                'type' => 0,
                'description' => 'The worst department in my opinion',
                'location' => 'film area',
                'contact' => 'filmdept@kimc.ac.ke',
                'featured' => 0
            ],
            [
                'name' => 'Production Training',
                'slug' => 'production-training',
                'type' => 0,
                'location' => 'sikumbuki',
                'contact' => 'production@kimc.ac.ke',
                'featured' => 0
            ],
            [
                'name' => 'Post Graduate',
                'slug' => 'post-graduate',
                'type' => 0,
                'location' => 'IDK',
                'contact' => 'post-graduate@kimc.ac.ke',
                'featured' => 0
            ]
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
