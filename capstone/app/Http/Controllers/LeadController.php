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

        $lead = Lead::create($validated);

        // Send Email Notification
        try {
            $settings = Setting::pluck('value', 'key');
            $recipient = $settings['mail_to_address'] ?? $settings['site_email'] ?? config('mail.from.address');
            
            if ($recipient) {
                $this->setDynamicMailConfig($settings);
                \Illuminate\Support\Facades\Mail::to($recipient)->send(new \App\Mail\LeadNotification($lead));
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Mail Error: ' . $e->getMessage());
            // We still return success because the lead is saved in the database
        }

        return response()->json(['success' => true, 'message' => 'Your inquiry has been sent successfully. Our team will contact you soon.']);
    }

    private function setDynamicMailConfig($settings)
    {
        if (isset($settings['mail_host'])) {
            config([
                'mail.default' => $settings['mail_mailer'] ?? 'smtp',
                'mail.mailers.smtp.host' => $settings['mail_host'],
                'mail.mailers.smtp.port' => $settings['mail_port'] ?? '587',
                'mail.mailers.smtp.encryption' => $settings['mail_encryption'] ?? 'tls',
                'mail.mailers.smtp.username' => $settings['mail_username'] ?? null,
                'mail.mailers.smtp.password' => $settings['mail_password'] ?? null,
                'mail.from.address' => $settings['mail_from_address'] ?? $settings['site_email'] ?? config('mail.from.address'),
                'mail.from.name' => $settings['mail_from_name'] ?? $settings['site_title'] ?? config('mail.from.name'),
            ]);
        }
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
