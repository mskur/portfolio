<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\Technology;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $catWeb = ProjectCategory::updateOrCreate(['name' => 'Web Application', 'slug' => 'web-application']);
        $catApi = ProjectCategory::updateOrCreate(['name' => 'RESTful API', 'slug' => 'restful-api']);
        $catAi  = ProjectCategory::updateOrCreate(['name' => 'AI & Machine Learning', 'slug' => 'ai-machine-learning']);
        $catCms = ProjectCategory::updateOrCreate(['name' => 'CMS & Portal', 'slug' => 'cms-portal']);

        $projects = [
            [
                'title' => 'Inventory Management System with REST API',
                'slug' => 'inventory-management-system',
                'category_id' => $catApi->id,
                'short_description' => 'A role-based inventory management system built using Laravel 12 with RESTful API.',
                'description' => 'A role-based inventory management system built using Laravel, consisting of a RESTful API and a web-based dashboard. The system supports product management, stock movement tracking (in & out), and user-based access control where super administrators can manage all data, while regular users are limited to their own records. The API is designed to be reusable and secure using token-based authentication, while the web application consumes the API to handle CRUD operations, dashboard statistics, and stock movement history with pagination and search functionality.', //[cite: 46]
                'role' => 'Backend Developer',
                'start_date' => Carbon::parse('2024-01-01'),
                'status' => 'Completed',
                'github_url' => 'https://github.com/mskur/Laravel-12-Inventory-Control-API',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['Laravel', 'PHP', 'MariaDB', 'Bootstrap']
            ],
            [
                'title' => 'Library Book Loan Management System',
                'slug' => 'library-book-loan',
                'category_id' => $catWeb->id,
                'short_description' => 'Web-based library management system using Laravel 11 and Tailwind CSS.',
                'description' => 'Developed a web-based library management system to handle book inventory, user management, loan transactions, and returns. The system implements role-based access control, automatic fine calculation for late returns, and transaction tracking with pagination and search features. Implemented book loan & return workflows with automatic stock updates and built admin and user dashboards.', //[cite: 46]
                'role' => 'Fullstack Developer',
                'start_date' => Carbon::parse('2025-03-01'),
                'end_date' => Carbon::parse('2025-05-31'),
                'status' => 'Completed',
                'github_url' => 'https://github.com/mskur/Laravel-11-Perpustakaan',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['Laravel', 'MariaDB', 'Tailwind CSS']
            ],
            [
                'title' => 'UMKM Durian Kocok Sales Website',
                'slug' => 'umkm-durian-kocok',
                'category_id' => $catWeb->id,
                'short_description' => 'E-commerce platform with live location tracking for small businesses.',
                'description' => 'The UMKM Durian Kocok Sales Website is an e-commerce platform developed to support small business owners in promoting and selling their signature Durian Kocok products. The website allows customers to browse available products and place orders, while only the admin can use the WhatsApp feature to directly communicate with buyers. Additionally, the platform includes live location tracking, enabling customers to see the vendor\'s current selling location in real-time.', //[cite: 46]
                'role' => 'Web Developer',
                'start_date' => Carbon::parse('2023-09-01'),
                'end_date' => Carbon::parse('2023-12-31'),
                'status' => 'Completed',
                'github_url' => 'https://github.com/mskur/UMKM-Durian-Kocok',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['CodeIgniter', 'PHP', 'MySQL', 'Bootstrap']
            ],
            [
                'title' => 'AI-Powered Golf Tournament Event Management',
                'slug' => 'ai-golf-tournament',
                'category_id' => $catAi->id,
                'short_description' => 'Event management system integrated with facial recognition and AI embeddings.',
                'description' => 'Developed an AI-powered golf tournament management system for event, participant, and photo management. Integrated face recognition and person re-identification for automated participant photo retrieval. Processed over 2,800 event photos and generated more than 14,000 AI embeddings, enabling high-speed participant photo retrieval.', //[cite: 48]
                'role' => 'Backend & AI Developer',
                'start_date' => Carbon::parse('2026-05-01'),
                'end_date' => Carbon::parse('2026-06-30'),
                'status' => 'Completed',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['Python', 'OpenCV', 'TensorFlow', 'InsightFace']
            ],
            [
                'title' => 'Hybrid CNN-LSTM for Paint Damage Classification (Thesis)',
                'slug' => 'hybrid-cnn-lstm-thesis',
                'category_id' => $catAi->id,
                'short_description' => 'Undergraduate thesis project using Deep Learning for defect classification.',
                'description' => 'Developed a hybrid CNN-LSTM model to classify multiple types of paint damage on dump truck beds. Applied image preprocessing techniques (resizing, normalization) and trained the model on real-world datasets using TensorFlow and Keras to improve classification accuracy and model robustness.', //[cite: 47, 48]
                'role' => 'AI Researcher',
                'start_date' => Carbon::parse('2024-01-01'),
                'end_date' => Carbon::parse('2024-07-31'),
                'status' => 'Completed',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['Python', 'TensorFlow', 'Keras', 'NumPy', 'Pandas']
            ],
            [
                'title' => 'Online Health Store (BNSP Certification)',
                'slug' => 'online-health-store',
                'category_id' => $catWeb->id,
                'short_description' => 'E-commerce platform developed for Junior Web Programmer certification.',
                'description' => 'The Online Health Store Website is an e-commerce platform developed as part of a Junior Web Programmer certification project. Built using PHP Native, the website features essential CRUD operations for managing products, categories, and transactions. Customers can add items to their shopping cart, review their selections, and view transaction history. Provides a streamlined online shopping platform tailored for health-related products.', //[cite: 46]
                'role' => 'Web Programmer',
                'start_date' => Carbon::parse('2023-09-01'),
                'end_date' => Carbon::parse('2023-10-31'),
                'status' => 'Completed',
                'github_url' => 'https://github.com/mskur/Sertifikasi-Online-Shop-Toko-Kesehatan',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['PHP', 'MySQL', 'Bootstrap']
            ],
            [
                'title' => 'Desa Sumbersuko Profile Website',
                'slug' => 'desa-sumbersuko-profile',
                'category_id' => $catCms->id,
                'short_description' => 'Village profile website built with CodeIgniter 3.',
                'description' => 'The Desa Sumbersuko Profile Website is a platform designed to introduce and promote the village of Sumbersuko. Built using CodeIgniter 3, the website includes a brief profile of the village, highlights local achievements, and provides updates on community activities. Additionally, it serves as an information hub for both residents and visitors, offering insights into the village\'s culture, events, and governance. Includes an embedded Google Map.', //[cite: 46]
                'role' => 'Web Developer',
                'start_date' => Carbon::parse('2023-03-01'),
                'end_date' => Carbon::parse('2023-07-31'),
                'status' => 'Completed',
                'github_url' => 'https://github.com/mskur/Desa-Sumbersuko',
                'thumbnail' => 'placeholder.png',
                'featured' => false,
                'techs' => ['CodeIgniter', 'PHP', 'MySQL', 'Bootstrap']
            ],
            [
                'title' => 'PT. PLN Unit Induk Transmisi JBM Profile Website',
                'slug' => 'pln-uit-jbm-profile',
                'category_id' => $catCms->id,
                'short_description' => 'Corporate profile website for PT. PLN Java-Bali-Madura Transmission Unit.',
                'description' => 'The PLN Unit Induk Transmisi JBM Profile Website is a platform developed to showcase the profile, achievements, and news updates of the PLN Unit. Built using CodeIgniter 3, the website includes essential CRUD functionality for managing content such as news, profiles, and media links. It also provides external links to related PLN platforms for seamless navigation. Serves as an informative hub for employees, stakeholders, and the public.', //[cite: 46]
                'role' => 'Web Developer Intern',
                'start_date' => Carbon::parse('2023-01-01'),
                'end_date' => Carbon::parse('2023-03-31'),
                'status' => 'Completed',
                'github_url' => 'https://github.com/mskur/PKL-PLN-UIT-JBM',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['CodeIgniter', 'PHP', 'MySQL', 'Bootstrap']
            ],
            [
                'title' => 'Special STI Division Monitoring Platform - PLN',
                'slug' => 'pln-sti-division',
                'category_id' => $catCms->id,
                'short_description' => 'Internal monitoring platform for the PLN STI division.',
                'description' => 'The Special STI Division Website is a comprehensive platform developed to support the operational and monitoring activities of the STI division. Built using CodeIgniter 3, the website features a range of functionalities, including network server monitoring, CRUD operations for PLN units across multiple levels, CRUD management for PLN equipment, and visualized network topology. Facilitates activity tracking, asset transactions, and link-related operations.', //[cite: 46]
                'role' => 'Web Developer Intern',
                'start_date' => Carbon::parse('2023-01-01'),
                'end_date' => Carbon::parse('2023-03-31'),
                'status' => 'Completed',
                'github_url' => 'https://github.com/mskur/PKL-PLN-STI',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['CodeIgniter', 'PHP', 'MySQL', 'Bootstrap']
            ],
            [
                'title' => 'News Portal & Content Management System',
                'slug' => 'news-portal-cms',
                'category_id' => $catCms->id,
                'short_description' => 'A comprehensive news portal with publication workflow and Laravel Scheduler.',
                'description' => 'Built a news portal and content management system with article, category, comment, and advertisement management. Implemented publication workflow, role-based authentication, and Laravel Scheduler. Designed analytics dashboards, search & filtering, and secure file management.', //[cite: 48]
                'role' => 'Fullstack Developer',
                'start_date' => Carbon::parse('2026-03-01'),
                'end_date' => Carbon::parse('2026-05-31'),
                'status' => 'Completed',
                'thumbnail' => 'placeholder.png',
                'featured' => true,
                'techs' => ['Laravel', 'PHP', 'MariaDB', 'Bootstrap']
            ],
            [
                'title' => 'K-Means Clustering for Student Major Recommendation',
                'slug' => 'kmeans-student-recommendation',
                'category_id' => $catAi->id,
                'short_description' => 'Machine learning clustering model for academic recommendations.',
                'description' => 'Developed a recommendation system using K-Means clustering to group students based on academic performance and interests. Performed data preprocessing, feature selection, and clustering evaluation to assess the effectiveness of major recommendations. Analyzed clustering results to support accurate student major recommendations.', //[cite: 47]
                'role' => 'Data Scientist',
                'start_date' => Carbon::parse('2022-10-01'),
                'end_date' => Carbon::parse('2022-12-31'),
                'status' => 'Completed',
                'thumbnail' => 'placeholder.png',
                'featured' => false,
                'techs' => ['Python', 'Scikit-learn', 'Pandas', 'NumPy']
            ]
        ];

        foreach ($projects as $projData) {
            $techs = $projData['techs'];
            unset($projData['techs']);

            $project = Project::updateOrCreate(['slug' => $projData['slug']], $projData);

            $techIds = Technology::whereIn('name', $techs)->pluck('id');
            $project->technologies()->sync($techIds);
        }
    }
}