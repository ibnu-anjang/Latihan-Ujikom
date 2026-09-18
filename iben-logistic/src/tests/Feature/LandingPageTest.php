<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pengiriman;

class LandingPageTest extends TestCase
{
    /**
     * Test landing page loads with 200 OK and contains brand and dynamic modules.
     */
    public function test_landing_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Iben Logistic');
        $response->assertSee('Lacak Pengiriman Kargo');
        $response->assertSee('Armada Tangguh');
        $response->assertSee('Galeri Fasilitas');
    }

    /**
     * Test lacak resi API returns successful shipment data.
     */
    public function test_lacak_resi_returns_valid_data(): void
    {
        $shipment = Pengiriman::first();

        if ($shipment) {
            $resiCode = 'IBN-' . str_pad($shipment->id, 4, '0', STR_PAD_LEFT);
            $response = $this->getJson('/lacak-resi?resi=' . $resiCode);

            $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'resi' => $resiCode,
                        'pelanggan' => $shipment->pelanggan,
                    ],
                ]);
        }
    }

    /**
     * Test lacak resi with empty or invalid query returns error response.
     */
    public function test_lacak_resi_handles_empty_or_invalid_resi(): void
    {
        $responseEmpty = $this->getJson('/lacak-resi?resi=');
        $responseEmpty->assertStatus(200)
            ->assertJson([
                'success' => false,
            ]);

        $responseInvalid = $this->getJson('/lacak-resi?resi=INVALID999999');
        $responseInvalid->assertStatus(200)
            ->assertJson([
                'success' => false,
            ]);
    }
}
