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
        $slug = $this->faker->unique()->slug;
        $title = implode(' ',explode('-', $slug));
        $image = $this->faker->image('public/images', 640, 480, null, false);

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->sentence,
            'full_description' => $this->faker->text,
            'image' => $image,
            'small_image' => $image,
        ];
    }
}
