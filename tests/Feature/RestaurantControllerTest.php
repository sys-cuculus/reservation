<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_access_without_login(): void
    {
        $response = $this->get('/restaurants');

        $response->assertOk();
        $response->assertSee('Log in');
        $response->assertDontSee('Dashboard');
    }

    public function test_access_login(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('restaurants');

        $response->assertOk();
        $response->assertSee('Dashboard');
        $response->assertDontSee('Log in');
    }

    public function test_no_restaurants(): void
    {
        $response = $this->get('/restaurants');

        $response->assertSee('No restaurants found');
    }

    public function test_restaurant_found(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get('/restaurants');
        $response->assertSee($restaurant->restaurant_name);
        $response->assertSee($restaurant->address);
        $response->assertSee($restaurant->tel);
    }
}
