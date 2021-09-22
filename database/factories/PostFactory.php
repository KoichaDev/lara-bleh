<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Create fake post for our body with 20 words
            // Remember, you can go to php artisan tinker and write this CLI App\Models\Post::factory() -> times(200) -> create(['user_id' => 5]);
            // This will create new automatic post for us without we need to manually create 200 post
            'body' => $this -> faker ->sentence(20)
        ];
    }
}
