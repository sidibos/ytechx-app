<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'content' => <<<HTML
                    <h2>Information We Collect</h2>
                    <p>We collect information you provide such as name, email, and message content when you contact us.</p>

                    <h2>How We Use Information</h2>
                    <p>To respond to your inquiries, improve services, and send updates.</p>

                    <h2>Your Rights</h2>
                    <p>You can request data deletion or updates anytime.</p>
                HTML
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'terms-of-service'],
            [
                'title' => 'Terms of Service',
                'content' => <<<HTML
                    <h2>Use of Website</h2>
                    <p>You agree not to misuse our platform or services.</p>

                    <h2>Intellectual Property</h2>
                    <p>All content is owned by the agency and cannot be reused without permission.</p>

                    <h2>Limitation of Liability</h2>
                    <p>We are not responsible for any damages from site usage.</p>
                HTML
            ]
        );
    }
}
