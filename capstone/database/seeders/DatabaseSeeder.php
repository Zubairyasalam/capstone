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
        \App\Models\Project::create(['title' => 'Capstone Tower', 'description' => 'Global headquarters development', 'category' => 'Architecture']);
        \App\Models\Project::create(['title' => 'Smart City Initiative', 'description' => 'Urban planning and tech integration', 'category' => 'Infrastructure']);

        // Seed Clients
        \App\Models\Client::create(['name' => 'Global Corp', 'logo' => 'logo1.png']);
        \App\Models\Client::create(['name' => 'Strategic Partners', 'logo' => 'logo2.png']);
    }
}
