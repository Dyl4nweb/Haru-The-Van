<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the single-van landing page renders successfully with all sections.
     */
    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Haru The Friendly Van');
        $response->assertSee('Comfortable and reliable van for your trips.');
        $response->assertSee('Toyota HiAce');
        $response->assertSee('Meet Kuya Haru');
        $response->assertSee('Trip Inquiry Form');
        $response->assertSee('Call Now');
        $response->assertSee('Message');
    }

    /**
     * Test that a visitor can submit a trip inquiry form.
     */
    public function test_inquiry_form_submits_successfully(): void
    {
        $payload = [
            'name' => 'Maria Santos',
            'phone' => '0917-123-4567',
            'rental_date' => now()->addDays(3)->format('Y-m-d'),
            'message' => 'Family trip to Baguio for 8 passengers.',
        ];

        $response = $this->post('/inquire', $payload);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Maria Santos',
            'phone' => '0917-123-4567',
        ]);
    }

    /**
     * Test that inquiry submission validates required fields.
     */
    public function test_inquiry_form_validation(): void
    {
        $response = $this->post('/inquire', []);

        $response->assertSessionHasErrors(['name', 'phone', 'rental_date']);
    }

    /**
     * Test that inquiry submission via JSON / AJAX works for Messenger integration.
     */
    public function test_inquiry_form_submits_via_json_successfully(): void
    {
        $payload = [
            'name' => 'Charls Client',
            'phone' => '0918-999-0000',
            'rental_date' => now()->addDays(5)->format('Y-m-d'),
            'message' => 'Tagaytay weekend getaway',
        ];

        $response = $this->postJson('/inquire', $payload);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
        ]);

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Charls Client',
            'phone' => '0918-999-0000',
        ]);
    }
}
