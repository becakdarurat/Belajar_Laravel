<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable,HasFactory;
    // Properti yang boleh di isi
    //protected $fillable = ['title','excerpt','body']; //ini yang boleh di isi sisanya tidak boleh
    // jika tidak mau menambahkan satu,satu kalau ada fild baru , ada kebalikannya dibawah ini
    protected $guarded = ['id'];  //id yang tidak boleh , sisanya boleh
    protected $with = ['category','User']; // otomatis di panggil withnya
    /* 
        Nb: tidak akan error karena message assigment nya kita pakai guarded, jadi cukup 1 slug, kalau fillable butuh 2 slug
    */

    public function scopeFilter($query, array $filters){
        // if(request('search')){
            // cek apakah ada search di dalam array filters? kalau ada, ambil apapun yang ada didalam search nya, dan kalau tidak ada false, supaya tidak dieksekusi
        // if(isset($filters['search']) ? $filters['search'] : false){
        //    return $query->where('title', 'like' , '%' . $filters['search'] . '%')
            // Kita akan cari misalkan ada di bodynya tidak di judul nya
                //   ->orWhere('body', 'like' , '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like' , '%' . $search . '%')
                        ->orWhere('body', 'like' , '%' . $search . '%');
        });

        // logic nya adalah, saat kita cari berdasarkan category, inputnya akan ngirim dengan name category dan di cari dari relasi nya di post, sehingga yang di tampilkan adalah khusus untuk categorynya saja

        // Versi Callback
        $query->when($filters['category'] ?? false, function($query, $category){
            // whereHas dipakai untuk menarget, query nya punya relationsiop apa?
            return $query->whereHas('category', function($query)use($category){ //kita pakai user supaya bisa mentarget parameter category di atas, kalau kita pakai cara di atas sebelum ini tidak bisa
                $query->where('slug', $category); //slug yang di cari dari category
            });     
        });
        
        // Versi arrow function
        $query->when($filters['authors'] ?? false, fn($query, $author)
         => $query->whereHas('User', fn($query) =>
            $query->where('username', $author)
            )
        );
    }

    // fungsi dari variable diatas, tidak dapat diubah kecuali id saja 

        // Menghubungkan ke Model category, nama function sama dengan nama model
        public function Category(){
            return $this->belongsTo(Category::class);
        }

                // dengan alias nama function
        // public function Author(){
        //     // alias
        //     return $this->belongsTo(User::class,'Author');
        // }
        public function User(){
            // alias
            return $this->belongsTo(User::class, 'user_id');
        }

    // kita menambahkan method getRouteKeyName untuk mengakali route model binding, agar bisa menggunakan satu resource. kan defaultnya id yang di cari setiap route, sekarang kita ganti jadi slug, bukan lagi id
        public function getRouteKeyName(){
            return 'slug';
        }





    private static $table_mahasiswa = [
        ["id" => "02738491",
        "nama" => "Sofyan Tanjung",
        "jurusan" => "Teknik Informatika",
        "alamat" => "Sibolga"]
    ];
    public static function allMahasiswa()
    {
        return collect(self::$table_mahasiswa);
    }
    public static function singleMahasiswa(){
        $mahasiswa = static::allMahasiswa();
        foreach($mahasiswa as $mhs){
            return $mhs;
        }
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
