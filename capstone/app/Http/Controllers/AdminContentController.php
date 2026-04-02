<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Setting;
use App\Models\Project;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    public function crm()
    {
        $leads = Lead::latest()->get();
        $settings = Setting::pluck('value', 'key');
        $projects = Project::latest()->get();
        $clients = Client::latest()->get();
        $services = Service::latest()->get();
        
        $media = [];
        $files = glob(public_path('images/*'));
        foreach ($files as $file) {
            $media[] = basename($file);
        }

        return view('admin.crm', compact('leads', 'settings', 'projects', 'clients', 'services', 'media'));
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
        Service::create($request->all());
        return redirect()->back()->with('success', 'Service added successfully!');
    }

    public function destroyService(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted!');
    }

    // PROJECT CRUD
    public function storeProject(Request $request)
    {
        $request->validate(['title' => 'required']);
        $data = $request->all();
        
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
        $data = $request->all();

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
}
