<?php

namespace Database\Factories;

use App\Models\Cd;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cd::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'author' => $this->faker->name(),
            'price' => $this->faker->numberBetween(20,200),
            'playlength'=>$this->faker->numberBetween(1,300),
            'cover_image' => $this->faker->image('public/storage/images',640,480, null, false)
        ];
    }
}
