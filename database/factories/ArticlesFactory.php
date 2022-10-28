<?php

namespace Database\Factories;
use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
	protected $model = Articles::class;
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'descriptions' => $this->faker->text(),
            'tags' => $this->faker->jobTitle,
            'featured_image' => $this->faker->imageUrl(640,480),
            'gallery' => $this->faker->imageUrl(640,480)
        ];
    }
}
