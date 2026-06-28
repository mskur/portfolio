<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certificate;
use App\Models\Skill;
use App\Models\SiteSetting;

class PageController extends Controller
{
    public function home()
    {
        // 1. Ambil data profil (karena ini portofolio tunggal, kita ambil data pertama)
        $profile = Profile::first();
        
        // 2. Ambil data pengaturan situs (untuk teks hero, dll)
        $settings = SiteSetting::first();
        
        // 3. Ambil data skills
        $skills = Skill::all();
        
        // 4. Ambil proyek yang di-highlight (featured)
        $featuredProjects = Project::with('category')
                                   ->where('featured', true)
                                   ->latest()
                                   ->take(6) // Batasi 6 agar beranda tidak terlalu penuh
                                   ->get();

        // 5. Kirim semua variabel tersebut ke halaman (view)
        return view('frontend.home', compact('profile', 'settings', 'skills', 'featuredProjects'));
    }

    public function about()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_year', 'desc')->get();
        $certificates = Certificate::orderBy('issue_date', 'desc')->get();
        
        return view('frontend.about', compact('experiences', 'educations', 'certificates'));
    }

    public function projects()
    {
        // Pagination 6 proyek per halaman dari start_date mulai terbaru
        // $projects = Project::with('category')->latest()->paginate(6);
        $projects = Project::with('category')->orderBy('start_date', 'desc')->paginate(6);
        return view('frontend.projects', compact('projects'));
    }

    public function projectDetail($slug)
    {
        // Eager load semua relasi ekosistem project
        $project = Project::with(['category', 'technologies', 'images', 'links'])->where('slug', $slug)->firstOrFail();
        return view('frontend.project_detail', compact('project'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function submitContact(ContactStoreRequest $request)
    {
        Contact::create($request->validated());
        return back()->with('success', 'Pesan kamu berhasil dikirim! Saya akan segera membalasnya.');
    }

    public function downloadCv()
    {
        $profile = Profile::first();
        if ($profile && $profile->cv) {
            return response()->download(storage_path('app/public/' . $profile->cv));
        }
        return back()->with('error', 'Dokumen CV belum tersedia saat ini.');
    }
}