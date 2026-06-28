<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserAndProfileSeeder::class,
            EducationAndExperienceSeeder::class,
            SkillAndTechnologySeeder::class,
            ProjectSeeder::class,
            OtherDataSeeder::class,
        ]);
    }
}