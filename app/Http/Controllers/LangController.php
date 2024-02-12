<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function index()
    {
        return view('lang');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function change()
    {
        if(session()->get('locale') == 'en'){
            $lang = "ar";
        }else{
            $lang = "en";
        }
        App::setLocale($lang);
        session()->put('locale', $lang);
        
        return redirect()->back();
    }
}
