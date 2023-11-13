<?php

namespace App\Models;

class Post 
{

    private static $table_mahasiswa = [
        ["id" => "02738491",
        "nama" => "Sofyan Tanjung",
        "jurusan" => "Teknik Informatika",
        "alamat" => "Sibolga"]
    ];
  private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Sofyan Tanjung",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et quibusdam, nesciunt assumenda molestias debitis quam temporibus nostrum nulla aspernatur, fuga nemo deleniti sapiente. Beatae soluta ad voluptates praesentium accusantium inventore perspiciatis dolores minima? Distinctio fugiat ea atque, sit officiis labore recusandae nostrum, rem vitae qui ab inventore id non iusto vel quis consectetur quaerat harum, animi temporibus reiciendis nemo facilis enim ad. Eveniet maiores modi ex, fugiat natus dicta similique assumenda, fuga officiis ad at sint ullam sit praesentium minus?
            "
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Doddy Ferdiansyah",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur itaque unde sapiente magnam odit eum provident ratione eligendi, molestiae voluptatem expedita ex, eaque sunt deleniti quidem, harum quod tempora adipisci delectus sequi cumque molestias? Quia aliquam facere eligendi. Qui consequuntur ea ad dolorem explicabo beatae nam rerum, sed totam inventore officia magni, nesciunt placeat temporibus omnis dolores ipsam, eius exercitationem numquam aut aperiam repellat amet voluptates. Eum facere ratione deserunt, dolores harum ipsam a labore excepturi, voluptate, delectus natus in illo ducimus voluptatum deleniti incidunt est repellat maiores distinctio reprehenderit dolorum cumque recusandae ad non. Adipisci possimus repudiandae nesciunt repellat!
            "
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }
    public static function find($slug)
    {
        $posts = static::all();
        //    $new_post = [];

        // foreach($posts as $p){
        //     if($p["slug"] === $slug){
        //         $new_post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
