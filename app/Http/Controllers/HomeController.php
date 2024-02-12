<?php

namespace App\Http\Controllers;

use App\Models\Law;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Clients;
use App\Models\MetaTag;
use App\Models\Youtube;
use App\Models\Category;
use App\Models\Projects;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $slider = Slider::all();
        $clients = Clients::orderBy('order_num', 'ASC')->get();
        $vid = Youtube::all();
        $pdfs = Law::all();
        $articles = Article::orderBy('id', 'desc')->limit(4)->get();
        $category = Category::where('id', '!=', '1')->get();
        $services = Services::where('category_id', '1')->get();
        $projects = Projects::all();
        $metaKeywords = MetaTag::where('type', 'keyword')->get();
        $metaDescription = MetaTag::where('type', 'description')->get();

        Artisan::call('cache:clear');
        return view('home', ['slider' => $slider, 'clients' => $clients, 'pdfs' => $pdfs, 'vid' => $vid, 'articles' => $articles, 'cat' => $category, "services" => $services, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription, "projects" => $projects]);
    }

    public function storage()
    {
        $art = Artisan::call('storage:link');
        return $art;
    }

    public function homeVideo($vid)
    {
        $video = Youtube::where('id', $vid)->get();
        return view('video-display', ['video' => $video]);
    }

     public function homePdf()
    {
        $PDF = Law::all();
        return view('PDF-display',['PDF'=>$PDF]);
    }
}
