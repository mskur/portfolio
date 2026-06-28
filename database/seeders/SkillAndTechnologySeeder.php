<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Technology;

class SkillAndTechnologySeeder extends Seeder
{
    public function run(): void
    {
        $skillsData = [
            // Programming Languages
            ['name' => 'PHP', 'category' => 'Programming Languages', 'level' => 90],
            ['name' => 'Python', 'category' => 'Programming Languages', 'level' => 85],
            ['name' => 'JavaScript', 'category' => 'Programming Languages', 'level' => 80],
            ['name' => 'C', 'category' => 'Programming Languages', 'level' => 70],
            ['name' => 'C++', 'category' => 'Programming Languages', 'level' => 70],
            
            // Web Frameworks & Libraries
            ['name' => 'Laravel', 'category' => 'Frameworks', 'level' => 95],
            ['name' => 'CodeIgniter', 'category' => 'Frameworks', 'level' => 90],
            ['name' => 'Bootstrap', 'category' => 'Frameworks', 'level' => 90],
            ['name' => 'Tailwind CSS', 'category' => 'Frameworks', 'level' => 85],
            ['name' => 'Node.js', 'category' => 'Frameworks', 'level' => 70],
            
            // Databases
            ['name' => 'MySQL', 'category' => 'Databases', 'level' => 90],
            ['name' => 'MariaDB', 'category' => 'Databases', 'level' => 90],
            ['name' => 'PostgreSQL', 'category' => 'Databases', 'level' => 85],
            
            // AI, ML & Computer Vision
            ['name' => 'TensorFlow', 'category' => 'AI & Computer Vision', 'level' => 85],
            ['name' => 'Keras', 'category' => 'AI & Computer Vision', 'level' => 85],
            ['name' => 'PyTorch', 'category' => 'AI & Computer Vision', 'level' => 80],
            ['name' => 'Scikit-learn', 'category' => 'AI & Computer Vision', 'level' => 80],
            ['name' => 'OpenCV', 'category' => 'AI & Computer Vision', 'level' => 85],
            ['name' => 'YOLOv8', 'category' => 'AI & Computer Vision', 'level' => 85],
            ['name' => 'InsightFace', 'category' => 'AI & Computer Vision', 'level' => 80],
            ['name' => 'OSNet', 'category' => 'AI & Computer Vision', 'level' => 80],
            ['name' => 'FAISS', 'category' => 'AI & Computer Vision', 'level' => 75],
            ['name' => 'NumPy', 'category' => 'Data Science', 'level' => 85],
            ['name' => 'Pandas', 'category' => 'Data Science', 'level' => 85],
            ['name' => 'Matplotlib', 'category' => 'Data Science', 'level' => 80],
            
            // Tools & Environment
            ['name' => 'Git & GitHub', 'category' => 'Tools', 'level' => 90],
            ['name' => 'Composer', 'category' => 'Tools', 'level' => 90],
            ['name' => 'Postman', 'category' => 'Tools', 'level' => 90],
            ['name' => 'DataGrip', 'category' => 'Tools', 'level' => 85],
            ['name' => 'FlyEnv', 'category' => 'Tools', 'level' => 80],
            ['name' => 'XAMPP', 'category' => 'Tools', 'level' => 90],
        ]; //

        foreach ($skillsData as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], [
                'level' => $skill['level'],
                'category' => $skill['category']
            ]);
            
            // Sync to Technologies Table
            Technology::updateOrCreate(['name' => $skill['name']]);
        }
    }
}