<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AdminContentController;
use App\Models\Lead;
use App\Models\Setting;
use App\Models\Project;
use App\Models\Client;
use App\Models\Service;

Route::get('/', function () {
    $settings = Setting::pluck('value', 'key');
    $services = Service::latest()->get();
    $projects = Project::latest()->get();
    $clients = Client::latest()->get();
    return view('welcome', compact('settings', 'services', 'projects', 'clients'));
});

Route::post('/contact', [LeadController::class, 'store'])->name('contact.store');

Route::get('/admin/crm', [AdminContentController::class, 'crm'])->name('admin.crm');
Route::post('/admin/settings/update', [AdminContentController::class, 'updateSettings'])->name('admin.settings.update');

// Services CRUD
Route::post('/admin/services', [AdminContentController::class, 'storeService'])->name('admin.services.store');
Route::delete('/admin/services/{service}', [AdminContentController::class, 'destroyService'])->name('admin.services.destroy');

// Projects CRUD
Route::post('/admin/projects', [AdminContentController::class, 'storeProject'])->name('admin.projects.store');
Route::delete('/admin/projects/{project}', [AdminContentController::class, 'destroyProject'])->name('admin.projects.destroy');

// Clients CRUD
Route::post('/admin/clients', [AdminContentController::class, 'storeClient'])->name('admin.clients.store');
Route::delete('/admin/clients/{client}', [AdminContentController::class, 'destroyClient'])->name('admin.clients.destroy');
