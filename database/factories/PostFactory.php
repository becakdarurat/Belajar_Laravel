<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // membuat kata kata random 2-8 kata menggunakan library faker
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // // digunakan untuk menghasilkan paragraf teks acak dengan panjang antara 5 hingga 10 kalimat. 
                // Ini dengan bawaan faker paragraphs(karena bawaan nya array)
            // 'body' => '<p>' . implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))) . '</p>',
                // Ini dengan array map
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            /* 
                $array = [
                        ['name' => 'John Doe'],
                        ['name' => 'Jane Doe'],
                        ];
                $implodedString = implode($array, function ($item) {
                            return $item['name'];
                        });
                echo $implodedString; // John Doe, Jane Doe

            */
            'user_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,2)
        ];
    }
}
