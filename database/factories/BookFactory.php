<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return[
        'title' => $this->faker->title(),
        'author_name' => $this->faker->name(),
        'description' => $this->faker->paragraph(),
        'price' => $this->faker->numberBetween(400, 3000),
        'user_id' => User::factory(),
        'mark'=>$this->faker->numberBetween(1,10),
        'genre_id' => Genre::factory(),


       ];
    }
}
