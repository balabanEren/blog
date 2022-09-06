<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Page;
use App\Models\article;

class HomepageController extends Controller
{
    public function index()
    {
        $data["articles"] = article::query()->orderBy("created_at", "DESC")->simplePaginate(3);
        $data["articles"]->withPath(url("/paginateArtical"));
        $data["categories"] = category::all();
        $data["pages"] = Page::query()->orderBy("order", "ASC")->get();
        return view("front.homepage", $data);
    }

    public function single($slug)
    {
        $artical = Article::query()->where("slug", $slug)->first() ?? abort(404, "Not found");
        $artical->increment("hit");
        $data["artical"] = $artical;
        $data["categories"] = category::all();
        return view("front.single", $data);
    }

    public function category($slug)
    {
        $category = Category::query()->whereSlug($slug)->first() ?? abort(404, "Not found");
        $data["categories"] = category::all();
        $data["category"] = $category;
        $data["articles"] = Article::query()->where("category_id", $category->id)->orderBy("created_at", "DESC")->simplePaginate(1);
        $data["pages"] = Page::query()->orderBy("order", "ASC")->get();
        return view("front.category", $data);
    }

    public function getPage()
    {
        dd('asd');
    }

}
