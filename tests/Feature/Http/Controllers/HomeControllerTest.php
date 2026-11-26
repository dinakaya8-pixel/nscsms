<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_accreditations_in_the_about_section(): void
    {
        Accreditation::create([
            'badge_number' => '01',
            'title' => 'Quality Assurance',
            'description' => 'Institutional accreditation details.',
            'theme' => 'forest',
            'icon' => 'award',
            'sort_order' => 1,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee("activeTab === 'about-accreditations'", false)
            ->assertSee('Quality Assurance');
    }
}
