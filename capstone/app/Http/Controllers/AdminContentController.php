<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Setting;
use App\Models\Project;
use App\Models\Client;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminContentController extends Controller
{
    public function crm()
    {
        $leads = Lead::latest()->paginate(10);
        $settings = Setting::pluck('value', 'key');
        $projects = Project::latest()->get();
        $clients = Client::latest()->get();
        $services = Service::latest()->get();
        $users = User::all();

        $media = [];
        $files = glob(public_path('images/*'));
        foreach ($files as $file) {
            $media[] = basename($file);
        }

        return view('admin.crm', compact('leads', 'settings', 'projects', 'clients', 'services', 'media', 'users'));
    }

    public function superAdmin()
    {
        $users = User::all();
        // Get DB Stats
        $tables = ['leads', 'users', 'services', 'projects', 'clients', 'settings'];
        $db_stats = [];
        foreach ($tables as $table) {
            $db_stats[$table] = \Illuminate\Support\Facades\DB::table($table)->count();
        }

        // Get Logs (latest 20 lines)
        $log_file = storage_path('logs/laravel.log');
        $logs = [];
        if (file_exists($log_file)) {
            $file_content = file($log_file);
            $logs = array_slice($file_content, -20);
            $logs = array_reverse($logs);
        }

        return view('admin.super_admin', compact('users', 'db_stats', 'logs'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except('_token');

        // Handle Simple Image Upload (for Hero/About)
        foreach ($request->allFiles() as $key => $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            Setting::updateOrCreate(['key' => $key], ['value' => $filename]);
        }

        foreach ($data as $key => $value) {
            if (!is_file($value)) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    // SERVICE CRUD
    public function storeService(Request $request)
    {
        $request->validate(['title' => 'required', 'description' => 'required']);
        Service::create($request->except('_token'));
        return redirect()->back()->with('success', 'Service added successfully!');
    }

    public function destroyService(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted!');
    }

    public function updateService(Request $request, Service $service)
    {
        $request->validate(['title' => 'required', 'description' => 'required']);
        $service->update($request->only('title', 'description', 'icon'));
        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    // PROJECT CRUD
    public function storeProject(Request $request)
    {
        $request->validate(['title' => 'required']);
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        Project::create($data);
        return redirect()->back()->with('success', 'Project added successfully!');
    }

    public function destroyProject(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project removed!');
    }

    // CLIENT CRUD
    public function storeClient(Request $request)
    {
        $request->validate(['name' => 'required']);
        $data = $request->except('_token');

        if ($request->hasFile('logo')) {
            $filename = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('images'), $filename);
            $data['logo'] = $filename;
        }

        Client::create($data);
        return redirect()->back()->with('success', 'Client added!');
    }

    public function destroyClient(Client $client)
    {
        $client->delete();
        return redirect()->back()->with('success', 'Client removed!');
    }

    // LEAD CRUD
    public function destroyLead(Lead $lead)
    {
        $lead->delete();
        return redirect()->back()->with('success', 'Lead record deleted successfully!');
    }

    // MEDIA UPLOAD
    public function uploadMedia(Request $request)
    {
        $request->validate([
            'media_files.*' => 'required|file|mimes:jpg,jpeg,png,gif,webp,svg,pdf|max:10240',
        ]);

        $uploaded = 0;
        foreach ($request->file('media_files', []) as $file) {
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $file->move(public_path('images'), $filename);
            $uploaded++;
        }

        return redirect()->back()->with('success', $uploaded . ' file(s) uploaded successfully!');
    }

    // MEDIA DELETE
    public function destroyMedia($filename)
    {
        $path = public_path('images/' . $filename);
        if (file_exists($path)) {
            unlink($path);
        }
        return redirect()->back()->with('success', 'File deleted.');
    }

    // USER MANAGEMENT
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,super_admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'New administrator added successfully!');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Administrator removed.');
    }
}
