<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AuthController;
use App\Models\Lead;
use App\Models\Setting;
use App\Models\Project;
use App\Models\Client;
use App\Models\Service;

// ─── Public: Home & Contact ───────────────────────────────────────────────────
Route::get('/', function () {
    $settings = Setting::pluck('value', 'key');
    $services = Service::latest()->get();
    $projects = Project::latest()->get();
    $clients  = Client::latest()->get();
    return view('welcome', compact('settings', 'services', 'projects', 'clients'));
});

Route::post('/contact', [LeadController::class, 'store'])->name('contact.store');

// ─── Auth: Login / Logout ─────────────────────────────────────────────────────
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// ─── Admin Routes (protected by session auth) ─────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/admin/crm', [AdminContentController::class, 'crm'])->name('admin.crm');
    Route::get('/super-admin', [AdminContentController::class, 'superAdmin'])->name('admin.superAdmin');
    Route::post('/admin/settings/update', [AdminContentController::class, 'updateSettings'])->name('admin.settings.update');

    // Services CRUD
    Route::post('/admin/services', [AdminContentController::class, 'storeService'])->name('admin.services.store');
    Route::delete('/admin/services/{service}', [AdminContentController::class, 'destroyService'])->name('admin.services.destroy');
    Route::put('/admin/services/{service}', [AdminContentController::class, 'updateService'])->name('admin.services.update');

    // Projects CRUD
    Route::post('/admin/projects', [AdminContentController::class, 'storeProject'])->name('admin.projects.store');
    Route::delete('/admin/projects/{project}', [AdminContentController::class, 'destroyProject'])->name('admin.projects.destroy');

    // Clients CRUD
    Route::post('/admin/clients', [AdminContentController::class, 'storeClient'])->name('admin.clients.store');
    Route::delete('/admin/clients/{client}', [AdminContentController::class, 'destroyClient'])->name('admin.clients.destroy');

    // Leads management
    Route::delete('/admin/leads/{lead}', [AdminContentController::class, 'destroyLead'])->name('admin.leads.destroy');

    // Media Upload & Delete
    Route::post('/admin/media/upload', [AdminContentController::class, 'uploadMedia'])->name('admin.media.upload');
    Route::delete('/admin/media/{filename}', [AdminContentController::class, 'destroyMedia'])->name('admin.media.destroy');

    // Super Admin Actions
    Route::post('/admin/users', [AdminContentController::class, 'storeUser'])->name('admin.users.store');
    Route::delete('/admin/users/{user}', [AdminContentController::class, 'destroyUser'])->name('admin.users.destroy');

    Route::post('/admin/system/clear-cache', function () {
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        return redirect()->back()->with('success', 'System cache cleared successfully!');
    })->name('admin.system.clear-cache');
});
