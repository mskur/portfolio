<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Skill;
use App\Models\Certificate;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil Statistik Utama
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'certificates' => Certificate::count(),
            'unread_messages' => Contact::where('is_read', false)->count(),
        ];

        // 2. Ambil Aktivitas Terbaru (Maksimal 5 data terakhir)
        $recentProjects = Project::with('category')->latest()->take(5)->get();
        $recentMessages = Contact::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentMessages'));
    }
}