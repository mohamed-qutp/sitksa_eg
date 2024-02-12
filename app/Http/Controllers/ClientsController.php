<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::orderBy('order_num','ASC')->get();
        return view('pages.clients')->with('clients',$clients);
    }
}
