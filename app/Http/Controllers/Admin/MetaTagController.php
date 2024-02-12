<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metatag;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meta = Metatag::all();
        return view('admin.pages.meta.index')->with('meta',$meta);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Metatag::create([
            'type' => $request->input('type'),
            'text' => $request->input('text')
        ]);
        Session()->put('msg','تم التسجيل بنجاح');
        return redirect(route('meta.index'));
        

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meta = Metatag::where('id',$id)->get();
        return view('admin.pages.meta.edit')->with('meta',$meta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Metatag::where('id',$id)->update([
            'type' => $request->input('type'),
            'text' => $request->input('text')
        ]);
        Session()->put('msg','تم التعديل بنجاح');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meta = Metatag::find($id);
        $meta->delete();
        Session()->put('msg','تم الحذف بنجاح');
        return redirect(route('meta.index'));
    }
}
