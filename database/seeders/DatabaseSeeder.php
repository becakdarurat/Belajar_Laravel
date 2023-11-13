<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            // usernya tidak kita buat manual , tapi pakai factory generet user random
        // User::create([
        //     'name' => 'Sofyan Tanjung',
        //     'email' => 'sofyan@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Doddy Ferdiansyah',
        //     'email' => 'doddy@gmail.com',
        //     'password' => bcrypt('54321')
        // ]);

        User::factory(3)->create();
        
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web-Design',
            'slug' => 'Web-Design'
        ]);
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore veritatis distinctio expedita id quae autem, nulla, nemo asperiores fugiat ducimus officiis nisi dicta maiores eaque qui. Aspernatur quisquam impedit doloribus pariatur quaerat sit a repellat eaque sequi adipisci vitae commodi, numquam, tempora officiis nihil ea accusamus. Omnis eligendi saepe nobis corrupti aliquid natus iste quo sed dolorem, officia doloribus. Reprehenderit, illo repellat, neque corporis facere beatae cumque maiores amet ipsam animi expedita tempora consequatur tempore eaque minima.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore veritatis distinctio expedita id quae autem, nulla, nemo asperiores fugiat ducimus officiis nisi dicta maiores eaque qui. Aspernatur quisquam impedit doloribus pariatur quaerat sit a repellat eaque sequi adipisci vitae commodi, numquam, tempora officiis nihil ea accusamus. Omnis eligendi saepe nobis corrupti aliquid natus iste quo sed dolorem, officia doloribus. Reprehenderit, illo repellat, neque corporis facere beatae cumque maiores amet ipsam animi expedita tempora consequatur tempore eaque minima.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore veritatis distinctio expedita id quae autem, nulla, nemo asperiores fugiat ducimus officiis nisi dicta maiores eaque qui. Aspernatur quisquam impedit doloribus pariatur quaerat sit a repellat eaque sequi adipisci vitae commodi, numquam, tempora officiis nihil ea accusamus. Omnis eligendi saepe nobis corrupti aliquid natus iste quo sed dolorem, officia doloribus. Reprehenderit, illo repellat, neque corporis facere beatae cumque maiores amet ipsam animi expedita tempora consequatur tempore eaque minima.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-keEmpat',
        //     'excerpt' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut et incidunt molestias voluptas sapiente, maiores eum esse a tempora tenetur quidem, perferendis minus iusto fuga cupiditate at excepturi, quasi tempore libero! Dolore veritatis distinctio expedita id quae autem, nulla, nemo asperiores fugiat ducimus officiis nisi dicta maiores eaque qui. Aspernatur quisquam impedit doloribus pariatur quaerat sit a repellat eaque sequi adipisci vitae commodi, numquam, tempora officiis nihil ea accusamus. Omnis eligendi saepe nobis corrupti aliquid natus iste quo sed dolorem, officia doloribus. Reprehenderit, illo repellat, neque corporis facere beatae cumque maiores amet ipsam animi expedita tempora consequatur tempore eaque minima.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
