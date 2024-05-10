<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellerRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_seller_registration_screen_can_be_rendered(): void
    {
        $response = $this->get(route('seller.register'));

        $response->assertStatus(200);
    }

    public function test_new_sellers_can_register() : void 
    {
        $response = $this->post(route('seller.register'), [
            'name' => 'test',
            'email' => 'test@test.com',
            'legal_id' => '577.112.867-83',
            'phone_number' => '(81) 98888-9999',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'seller',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@test.com',
            'legal_id' => '577.112.867-83',
            'phone_number' => '(81) 98888-9999',
            'role' => 'seller',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect(route('seller.dashboard', absolute:false));

    }
}
