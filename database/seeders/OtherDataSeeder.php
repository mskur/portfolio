<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;
use App\Models\SocialLink;
use Carbon\Carbon;

class OtherDataSeeder extends Seeder
{
    public function run(): void
    {
        Certificate::updateOrCreate(
            ['title' => 'Junior Web Programmer'],
            [
                'issuer' => 'BNSP',
                'issue_date' => Carbon::parse('2023-09-01'),
            ]
        );

        SocialLink::updateOrCreate(['platform' => 'LinkedIn'], ['url' => 'https://linkedin.com/in/imam-maskuri-216bb4311']);
        SocialLink::updateOrCreate(['platform' => 'Github'], ['url' => 'https://github.com/mskur']);
    }
}