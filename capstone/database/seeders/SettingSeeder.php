<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'hero_headline' => "Global Business\nSolutions.\nSeamlessly Delivered.",
            'hero_tagline' => '"The Stone That Sets Every Angle True"',
            'hero_subtext' => 'A trusted global connecting centre providing end-to-end business solutions, transforming organizations through innovation, strategy, and operational excellence since 2016.',
            'hero_btn_text' => 'Get Started',
            'about_description' => 'Capstone Global Services India Private Limited is a Chennai-based integrated business solutions provider, delivering comprehensive services across industries with over a decade of expertise.',
            'about_mission' => 'We act as a global connecting hub, enabling businesses to scale efficiently through strategic consulting, outsourcing, infrastructure development, and technology-driven transformation.',
            'contact_email' => 'info@capstoneglobalservices.com',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
