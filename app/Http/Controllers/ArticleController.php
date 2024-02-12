<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Article_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id','DESC')->get();
        return view('pages.articles')->with('articles',$articles);
    }

    public function show($id,$slug)
    {
        $article = Article::where('slug',$slug)->get();
        $details = Article_Details::where('article_id',$article[0]['id'])->get();
        $otherarticles = Article::where('slug','!=',$slug)->take(3)->orderBy('id','DESC')->get();
        return view('pages.articleView',[
            'article' => $article,
            'details' => $details,
            'otherarticles' => $otherarticles,
        ]);
    }

}
