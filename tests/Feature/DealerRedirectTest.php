<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DealerRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_dealer_is_redirected_after_login()
    {
        $dealer = User::factory()->create([
            'role' => 'dealer'
        ]);

        $response = $this->post('/login', [
            'email' => $dealer->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dealer.cars.index'));
    }

    public function test_dealer_is_redirected_from_dashboard()
    {
        $dealer = User::factory()->create([
            'role' => 'dealer'
        ]);

        $response = $this->actingAs($dealer)->get('/dashboard');

        $response->assertRedirect(route('dealer.cars.index'));
    }

    public function test_regular_user_can_access_dashboard()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertViewIs('dashboard.user');
    }
}
