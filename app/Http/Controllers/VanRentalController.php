<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VanRentalController extends Controller
{
    /**
     * Show the landing page for Haru The Friendly Van.
     */
    public function index(): View
    {
        $van = [
            'name' => 'Haru The Friendly Van',
            'headline' => 'Comfortable and reliable van for your trips.',
            'subheadline' => 'Safe, comfortable, and affordable passenger van rental with a trusted, friendly driver. Ideal for family vacations, airport transfers, barkada getaways, and out-of-town adventures.',
            'model' => 'Toyota HiAce Commuter / Grandia',
            'capacity' => 'Up to 12 - 14 Passengers',
            'ac' => 'Dual Front & Rear Air Conditioning',
            'description' => 'A well-maintained, clean, and smoke-free 14-seater van designed for comfortable long-distance travel across Luzon. Equipped with ice-cold dual air conditioning, reclining seats, generous luggage space, and regular safety inspections.',
            'service_type' => 'With Professional Driver (No self-drive)',
            'availability' => 'Available 7 days a week (Advance booking recommended)',
            'location' => 'Metro Manila & Rizal (Servicing all points in Luzon)',
            'owner' => [
                'name' => 'Charls Pandeo',
                'role' => 'Owner & Driver',
                'phone' => '+63 917 555 8291',
                'phone_display' => '0917-555-8291',
                'phone_tel' => '+639175558291',
                'facebook_name' => 'facebook.com/pandeo.charls',
                'messenger_url' => 'https://m.me/pandeo.charls',
                'messages_url' => 'https://www.facebook.com/messages/t/pandeo.charls',
                'facebook_url' => 'https://www.facebook.com/pandeo.charls/',
                'tiktok_handle' => '@chatong61',
                'tiktok_url' => 'https://www.tiktok.com/@chatong61',
                'instagram_handle' => '@cha_tong',
                'instagram_url' => 'https://www.instagram.com/cha_tong',
                'location' => 'Metro Manila & Rizal (Trips across Luzon)',
            ],
            'specs' => [
                [
                    'label' => 'Van Model',
                    'value' => 'Toyota HiAce High-Roof',
                    'detail' => 'Smooth, dependable ride',
                ],
                [
                    'label' => 'Passenger Capacity',
                    'value' => '12 – 14 Seats',
                    'detail' => 'Plenty of legroom for all',
                ],
                [
                    'label' => 'Air Conditioning',
                    'value' => 'Dual Front & Rear AC',
                    'detail' => 'Crisp & cool in summer heat',
                ],
                [
                    'label' => 'Luggage Space',
                    'value' => 'Spacious Trunk',
                    'detail' => 'Fits suitcases, bags & coolers',
                ],
            ],
            'trip_proofs' => [
                [
                    'id' => 1,
                    'destination' => 'Baguio City & Benguet',
                    'tag' => 'Family Vacation',
                    'title' => 'Baguio Mountain Family Trip',
                    'caption' => 'Comfortable long climb to Baguio with full family luggage and reliable dual air conditioning.',
                    'image' => 'images/clients/trip-1.jpg',
                ],
                [
                    'id' => 2,
                    'destination' => 'Batangas Beach Resort',
                    'tag' => 'Barkada Getaway',
                    'title' => 'Weekend Beach Roadtrip',
                    'caption' => 'Spacious seating for 12 passengers plus bags, food coolers, and beach equipment.',
                    'image' => 'images/clients/trip-2.jpg',
                ],
                [
                    'id' => 3,
                    'destination' => 'NAIA Terminals & Hotels',
                    'tag' => 'Airport Transfer',
                    'title' => 'Balikbayan Airport Pickup',
                    'caption' => 'On-time pickup with generous rear trunk space for heavy balikbayan boxes and suitcases.',
                    'image' => 'images/clients/trip-3.jpg',
                ],
                [
                    'id' => 4,
                    'destination' => 'Tagaytay Ridge & Laguna',
                    'tag' => 'Day Tour & Sightseeing',
                    'title' => 'Tagaytay Sightseeing Tour',
                    'caption' => 'Safe, relaxed driving by Charls for a hassle-free day tour and family gathering.',
                    'image' => 'images/clients/trip-4.jpg',
                ],
            ],
        ];

        return view('landing', compact('van'));
    }

    /**
     * Handle trip inquiry submission.
     */
    public function storeInquiry(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
            'rental_date' => ['required', 'date', 'after_or_equal:today'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        Inquiry::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your trip inquiry has been received.',
            ]);
        }

        return redirect()->to(url()->previous().'#inquiry')
            ->with('success', 'Thank you! Your trip inquiry has been received. Charls will call or text you shortly to confirm your schedule and provide a direct quote.');
    }
}
