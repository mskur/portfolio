<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectImageController;
use App\Http\Controllers\Admin\ProjectLinkController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SiteSettingController;

/*
|--------------------------------------------------------------------------
| Public Routes (Frontend)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/projects/{slug}', [PageController::class, 'projectDetail'])->name('project.detail');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/download-cv', [PageController::class, 'downloadCv'])->name('download.cv');
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Admin Routes (Dashboard)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Single Record Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/site-settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('/site-settings', [SiteSettingController::class, 'update'])->name('settings.update');

    // CRUD Resources
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('social-links', SocialLinkController::class);
    
    // Contact Messages (Read & Delete only)
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);

    // Project Child Resources
    Route::prefix('projects/{project}')->name('projects.')->group(function () {
        Route::resource('images', ProjectImageController::class)->except(['show']);
        Route::resource('links', ProjectLinkController::class)->except(['show']);
    });
});

require __DIR__.'/auth.php';