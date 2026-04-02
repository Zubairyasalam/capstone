<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Setting;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Lead::create($validated);

        return response()->json(['success' => true, 'message' => 'Your inquiry has been sent successfully. Our team will contact you soon.']);
    }

    public function crm()
    {
        $leads = Lead::latest()->get();
        $settings = Setting::pluck('value', 'key');
        return view('admin.crm', compact('leads', 'settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except('_token');
        
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Website content updated successfully!');
    }
}
