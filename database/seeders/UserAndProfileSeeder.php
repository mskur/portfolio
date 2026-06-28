<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserAndProfileSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'maskuribekerja@gmail.com'],
            [
                'name' => 'Imam Maskuri',
                'password' => Hash::make('password123'),
            ]
        );

        Profile::updateOrCreate(
            ['email' => 'maskuribekerja@gmail.com'],
            [
                'user_id' => $user->id,
                'full_name' => 'Imam Maskuri',
                'profession' => 'Junior Backend Developer | Laravel Developer',
                'headline' => 'I build robust, secure, and scalable backend systems & AI Models.',
                'bio' => 'Computer Science graduate (GPA 3.94/4.00) with hands-on experience in backend and web application development using Laravel, PHP, PostgreSQL, MySQL, and Python. Experienced in developing AI-powered systems, RESTful APIs, and database-driven applications, including event management, content management systems, and computer vision solutions. Passionate about building scalable, maintainable, and high-performance software while continuously improving technical skills and delivering reliable solutions.', //[cite: 48]
                'phone' => '+62 819-7325-3657',
                'city' => 'Gresik',
                'province' => 'East Java',
                'country' => 'Indonesia',
            ]
        );
    }
}