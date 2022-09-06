<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class articalSeeder extends Seeder
{

    public function run()
    {
        $articleNames = [
            "Married singers",
            "Nasa Rocket ",
            "Top 10 songs",
            "FaceBook sold??",
            "What is inside our Bodies?"
        ];

        $articleDescription = "Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora tellus ligula porttitor metus. ";

        $articleImages = [
            "a.png",
            "b.png",
            "c.png",
            "d.png"
        ];

        foreach ($articleNames as $name){
            Article::create([
                "category_id" => Category::query()->inRandomOrder()->first()->id,
                "title" => $name,
                "image" => $articleImages[rand(0,3)],
                "context" => $articleDescription,
                "slug" => Str::slug($name, '_')
            ]);
        }
    }



}
