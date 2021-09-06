<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->Name(),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2), 
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'auteur' => $this->faker->lastName(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),

        ];
    }
}
