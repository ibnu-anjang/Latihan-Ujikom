<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class FilamentTest extends TestCase
{
    public function test_admin_login_page_is_accessible(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    public function test_admin_dashboard_is_accessible_when_authenticated(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(200);
    }

    public function test_service_resource_is_accessible(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/admin/services');
        $response->assertStatus(200);
    }

    public function test_armada_resource_is_accessible(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/admin/armadas');
        $response->assertStatus(200);
    }

    public function test_pengiriman_resource_is_accessible(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/admin/pengirimen');
        $response->assertStatus(200);
    }

    public function test_anggota_tim_resource_is_accessible(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/admin/anggota-tims');
        $response->assertStatus(200);
    }
}
