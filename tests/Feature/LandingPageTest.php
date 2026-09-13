<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
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
        $response->assertSee('Meet Charls Pandeo');
        $response->assertSee('Trip Inquiry & Instant Chat', false);
        $response->assertSee('Chat with Charls on Facebook Messenger');
        $response->assertSee('Inquire via Gmail');
        $response->assertSee('charlspandeo@gmail.com');
        $response->assertSee('Send via SMS / Text');
        $response->assertSee('chip-btn');
        $response->assertSee('Baguio City');
        $response->assertSee('Tagaytay');
        $response->assertSee('Batangas Beach');
        $response->assertSee('Airport (NAIA)');
        $response->assertSee('Day Tour (Balikan)');
        $response->assertSee('11 – 14 Pax (Full)');
        $response->assertSee('selection-summary');
        $response->assertSee('Travel Memories with Haru & Charls', false);
        $response->assertSee('Client Proof & Trip Highlights', false);
        $response->assertSee('Baguio Mountain Family Trip');
        $response->assertSee('tel:+639175558291');
        $response->assertSee('btn-copy-phone');
        $response->assertSee('images/logo.png');
        $response->assertSee('Messenger');
        $response->assertSee('@cha_tong');
        $response->assertSee('https://www.instagram.com/cha_tong');
        $response->assertSee('back-to-top-btn');
        $response->assertSee('Back to Top');
    }

    /**
     * Test that the landing page has direct instant communication channels without database dependence.
     */
    public function test_landing_page_provides_direct_communication_channels(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('https://www.facebook.com/messages/t/pandeo.charls');
        $response->assertSee('charlspandeo@gmail.com');
        $response->assertSee('+639175558291');
    }
}
