<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class pageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageCount=0;
        $pageDescription = "Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora tellus ligula porttitor metus. ";
        $pages=["About","Career","Vision","Mission"];
        foreach ($pages as $page){
            $pageCount++;
            Page::query()->create([
                "title"=>$page,
                "slug" => Str::slug($page, '_'),
                "image"=>"https://avatars.mds.yandex.net/i?id=9d15dcbefff514d46c8e8dc6359e33c5-5303358-images-thumbs&n=13",
                "content"=>$pageDescription,
                "order"=>$pageCount,
                "created_at"=>now(),
                "updated_at"=>now(),
            ]);
        }
    }
}
