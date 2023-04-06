<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'author' => fake()->name,
            'category_id' => Category::get()->random()->id,
            'content' => fake()->text(300),
            'age' => rand(10,18),
            'count_list' => rand(100,300),
            'year' => rand(1000,2000),

            'image' => 'public/images/umWYsXugo94i95nL38zLcT2i2kSE1b8CCJ9YUteu.png',
            'file_path' => 'public/files/nUAFPMaFw4OzGc4FkoSpbsFDQ6Jmfh1JOyfvIpHq.pdf',
        ];
    }
}
