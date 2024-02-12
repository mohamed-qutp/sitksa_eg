<?php

namespace App\Http\Controllers;

use App\Models\Metatag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $metaKeywords = MetaTag::where('type','keyword')->get();
        $metaDescription = MetaTag::where('type','description')->get();
        View::share(['metaKeywords' => $metaKeywords , 'metaDescription' => $metaDescription]);
    }
}
