<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metatag;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class MetaController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Metatag::create([
                'text' => $request->input('text')
            ]);
            Session()->put('msg','تم التسجيل بنجاح');
            return redirect(route('meta.index'));

        } catch (Exception $e) {
            $e;
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'text' => $request->input('text')
        ]);
        try {
            Metatag::where('id',$id)->update([
                'text' => $request->input('text')
            ]);
            Session()->put('msg','تم التعديل بنجاح');
            return back();

        } catch (Exception $e) {
            $e;
        }
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
