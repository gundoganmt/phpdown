<?php

namespace Database\Factories;
use App\Models\Video;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Video::class;

    public function definition()
    {
        $source = ['Youtube', 'Facebook', 'Twitter', 'Instagram'];
        return [
            'title' => $this->faker->name,
            'source' => $source[rand(0,3)],
            'web_url' => now(),
            'thumbnail' => "somestring",
            'created_at' => $this->faker->dateTimeThisMonth()
        ];
    }
}
