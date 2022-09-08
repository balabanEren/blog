<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
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
            'categories',


        ]));
    }

    public function category($slug)
    {
        $category = Category::query()->whereSlug($slug)->first() ?? abort(404, "Not found");
        $categories = category::all();
        $articles = Article::query()->where("category_id", $category->id)->orderBy("created_at", "DESC")->simplePaginate(3);
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

    public function postContact(Request $request){
      $rules=[
          'name'=>'required | min:3 | max:24',
          'email'=>'required | email',
          'topic'=>'required',
          'message'=>'required | min:12',
      ];
      $validate=Validator::make($request->post(),$rules);
      if ($validate->errors()){
          return redirect()->route("contact_page")->withErrors($validate)->withInput();
      }

      $contact=new Contact;
      $contact->name=$request->name;
      $contact->email=$request->email;
      $contact->topic=$request->topic;
      $contact->message=$request->message;
      $contact->save();
      return redirect()->route("contact_page")->with("success","your message has been delivered ");
    }

}
