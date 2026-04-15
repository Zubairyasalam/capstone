<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SettingSeeder::class);

        // Seed Services (8 original)
        $services = [
            ['title' => 'Professional Services', 'description' => 'Audit, Tax, Accounting, Strategy & Management Consulting.'],
            ['title' => 'Human Resources & Recruitment', 'description' => 'Talent Acquisition, Payroll & HR Administration, Learning & Development.'],
            ['title' => 'Business Process Outsourcing (BPO)', 'description' => 'Customer Support, CRM, Back-Office Operations, Procurement.'],
            ['title' => 'Operational & Facilities Management', 'description' => 'Integrated Facilities, Travel & Logistics, PR & Corporate Communications.'],
            ['title' => 'Construction & Infrastructure', 'description' => 'Commercial Fit-Out, Turnkey Office Development, Infrastructure Projects.'],
            ['title' => 'Construction Consultancy', 'description' => 'Project Management, Cost & Risk Management, Quality Assurance.'],
            ['title' => 'Real Estate & Asset Management', 'description' => 'REIT Advisory, Property & Asset Management, Workplace Strategy.'],
            ['title' => 'Advisory & Business Consulting', 'description' => 'Market Entry, Investment Structuring, Corporate Strategy.']
        ];
        foreach($services as $i => $s) {
            \App\Models\Service::create([
                'title' => $s['title'], 
                'description' => $s['description'], 
                'icon' => str_pad($i + 1, 2, '0', STR_PAD_LEFT), // Using numbers like 01, 02 as original
                'category' => 'Global Solutions'
            ]);
        }

        // Seed Projects
        for ($i = 1; $i <= 18; $i++) {
            \App\Models\Project::create([
                'title' => 'Capstone Development Part ' . $i, 
                'description' => 'Urban planning and tech integration ' . $i, 
                'category' => 'Infrastructure'
            ]);
        }

        // Seed Clients
        for ($i = 1; $i <= 24; $i++) {
            \App\Models\Client::create(['name' => 'Corporate Partner ' . $i, 'logo' => 'logo_dummy.png']);
        }

        // Seed Dummy Leads
        for ($i = 1; $i <= 256; $i++) {
            \App\Models\Lead::create([
                'name' => 'Potential Client ' . $i,
                'email' => 'client' . $i . '@example.com',
                'service' => 'Consulting',
                'message' => 'Interested in your global solutions.',
                'created_at' => now()->subDays(rand(1, 90))
            ]);
        }

        // Seed Test Users
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'super@capstone.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'super_admin'
        ]);

        \App\Models\User::create([
            'name' => 'Regular Admin',
            'email' => 'admin@capstone.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin'
        ]);

        // Seed Dummy Users (Administrators)
        for ($i = 1; $i <= 12; $i++) {
            \App\Models\User::create([
                'name' => 'Admin User ' . $i,
                'email' => 'admin' . $i . '@capstone.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'admin'
            ]);
        }
    }
}
