<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;
use App\Models\Experience;
use Carbon\Carbon;

class EducationAndExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Education::updateOrCreate(
            ['institution' => 'Universitas Pembangunan Nasional "VETERAN" Jawa Timur'],
            [
                'degree' => 'Bachelor of Informatics Engineering',
                'major' => 'Informatics Engineering',
                'gpa' => 3.94,
                'start_year' => 2020,
                'end_year' => 2024,
                'description' => 'Relevant Coursework: Web Programming, Database Systems, Software Engineering, Machine Learning. Thesis: Hybrid CNN-LSTM for Classifying Types of Paint Damage on Dump Truck Beds.' //[cite: 48]
            ]
        );

        $experiences = [
            [
                'position' => 'Field & Painting Support (Part-Time)',
                'company' => 'Heavy Equipment Repair Project',
                'employment_type' => 'Part-time',
                'location' => 'Gresik, Indonesia',
                'start_date' => Carbon::parse('2019-08-01'),
                'end_date' => Carbon::parse('2025-02-28'),
                'currently_working' => false,
                'description' => 'Performed surface preparation using grinding tools, wire brushes, body filler, and sanding prior to industrial painting. Assisted with industrial painting activities while adhering to quality and workplace safety standards.' //[cite: 48]
            ],
            [
                'position' => 'Web Developer Intern',
                'company' => 'PT. PLN Java-Bali-Madura Transmission Main Unit',
                'employment_type' => 'Internship',
                'location' => 'Sidoarjo, Indonesia',
                'start_date' => Carbon::parse('2023-01-01'),
                'end_date' => Carbon::parse('2023-03-31'),
                'currently_working' => false,
                'description' => 'Developed a corporate profile website to enhance PLN\'s online presence and information accessibility. Built a dedicated website for the STI division to showcase projects, initiatives, and technological advancements.' //[cite: 47, 48]
            ],
            [
                'position' => 'Head of Events',
                'company' => 'Community Service Program: Stunting-Free Village Initiative',
                'employment_type' => 'Contract',
                'location' => 'Indonesia',
                'start_date' => Carbon::parse('2023-03-01'),
                'end_date' => Carbon::parse('2023-07-31'),
                'currently_working' => false,
                'description' => 'Led and coordinated community education programs on nutrition and health to prevent stunting. Organized the Supplementary Feeding Program (PMT) for children and pregnant women at risk of malnutrition. Contributed to community solutions through food product development.' //[cite: 47, 48]
            ],
            [
                'position' => 'Senior Mentor',
                'company' => 'Faculty Orientation Program (MOSAIK)',
                'employment_type' => 'Contract',
                'location' => 'Surabaya, Indonesia',
                'start_date' => Carbon::parse('2021-07-01'),
                'end_date' => Carbon::parse('2021-09-30'),
                'currently_working' => false,
                'description' => 'Guided new students through academic and social orientation activities. Collaborated with organizing teams to ensure smooth event execution and participant engagement.' //[cite: 47, 48]
            ]
        ];

        foreach ($experiences as $exp) {
            Experience::updateOrCreate(['position' => $exp['position'], 'company' => $exp['company']], $exp);
        }
    }
}