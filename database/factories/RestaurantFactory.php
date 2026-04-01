<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_name'   => fake()->name(),
            'address'           => fake()->text(),
            'tel'               => $this->createPhoneNumber(),
        ];
    }

    /**
     * create a random phone number 
     */
    private function createPhoneNumber(int $count=10): string
    {
        $phoneNumStr = '';
        for ($i=0; $i<$count;$i++) {
            $numStr = strval(mt_rand(0, 9));
            $phoneNumStr = $phoneNumStr . $numStr;
        }

        return $phoneNumStr;
    }
}
