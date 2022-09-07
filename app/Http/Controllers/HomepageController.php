<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Page;
use App\Models\article;

class HomepageController extends Controller
{
  public function __construct(){
      view()->share("pages",Page::query()->orderBy("order", "ASC")->get());
  }

    public function index()
    {
        $articles = article::query()->orderBy("created_at", "DESC")->simplePaginate(3);
        $articles->withPath(url("/paginateArtical"));
        $categories = category::all();
        $pages = Page::query()->orderBy("order", "ASC")->get();
        return view("front.homepage", compact([
            'articles',
            'categories',
            'pages'
        ]));
    }

    public function single($slug)
    {
        $artical = Article::query()->where("slug", $slug)->first() ?? abort(404, "Not found");
        $artical->increment("hit");
        $categories = category::all();
        return view("front.single", compact([
            'artical',
            'categories'

        ]));
    }

    public function category($slug)
    {
        $category = Category::query()->whereSlug($slug)->first() ?? abort(404, "Not found");
        $categories = category::all();
        $articles = Article::query()->where("category_id", $category->id)->orderBy("created_at", "DESC")->simplePaginate(1);
        $pages = Page::query()->orderBy("order", "ASC")->get();
        return view("front.category", compact([
            'articles',
            'categories',
            'pages',
            'category'
        ]));
    }

    public function getPage($pageName)
    {

        $pages = Page::query()->orderBy("order", "ASC")->get();
        $currentPage = $pages->where('slug', '=', $pageName)->first();

        if (!$currentPage) {
            return "Not Found";
        }

        return view("front.page", compact([
            // 'page',
            'pages',
            'currentPage',
        ]));

    }
    public function contact(){
        return view("front.contact");
    }

}
