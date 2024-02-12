<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function categoryIndex()
    {
        $category = Category::where('id','!=','1')->get();
        return view('pages.category')->with('cat',$category);
    }

    public function servicesIndex($id,$slug)
    {
        $services = Services::where('category_id',$id)->with('category')->get();
        $cat = Category::where('slug',$slug)->get();
        return view('pages.services',['services'=>$services,'cat'=>$cat]);
    }
}
