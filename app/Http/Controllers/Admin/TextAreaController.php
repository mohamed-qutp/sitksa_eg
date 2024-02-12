<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Textarea;
use Illuminate\Http\Request;

class TextAreaController extends Controller
{
    public function index()
    {
        $texts = Textarea::all();
        return view('admin.text')->with('texts',$texts);
    }

    public function store(Request $request)
    {
        Textarea::create([
            'text' => $request->input('editor1'),
        ]);
        return redirect(route('text.index'));
    }
}
