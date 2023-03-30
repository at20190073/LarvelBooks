<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\User;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        User::truncate();
        Genre::truncate();

           // Book::factory(5)->create();

        $user1=User::factory()->create();
        $user2=User::factory()->create();
        $user3=User::factory()->create();
        $user4=User::factory()->create();
        $genre1=Genre::factory()->create();
        $genre2=Genre::factory()->create();
        $genre3=Genre::factory()->create();
        $genre4=Genre::factory()->create();

        Book::factory(2)->create([
        'user_id'=>$user1->id,
        'genre_id'=>$genre1->id,
        ]);
        Book::factory(2)->create([
            'user_id'=>$user2->id,
            'genre_id'=>$genre2->id,
        ]);
        Book::factory()->create([
            'user_id'=>$user3->id,
            'genre_id'=>$genre3->id,
            ]);
        Book::factory()->create([
        'user_id'=>$user4->id,
        'genre_id'=>$genre4->id,
        ]);
       
    }
}
