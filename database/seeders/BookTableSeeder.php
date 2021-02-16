<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;


class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i<=150; $i++){
            Book::create([
                'title' =>$faker->sentence(3, true),
                'description' =>$faker->sentence(6, true),
                'price' =>$faker->numberBetween(25, 150),
                'author_id' =>$faker->numberBetween(1, 50),
            ]);
        }
    }
}
