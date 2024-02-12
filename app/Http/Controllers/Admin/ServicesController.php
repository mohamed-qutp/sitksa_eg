<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($catID)
    {
        $services = Services::where('category_id',$catID)->get();
        return view('admin.pages.services.index')->with('services',$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        return view('admin.pages.services.create')->with('cat',$cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            //return $file."</br>".$fileName;
            
            $file->storeAs('public/Services',time().'.'.$fileName);
            $img_path = 'Services/'.time().'.'.$fileName;

            $services = Services::latest()->first();
            if($services['align'] == "right"){
                $align = "left";
            }else{
                $align = "right";
            }
            Services::create([
                'category_id' => $request->input('category'),
                'name_en' => $request->input('name_en'),
                'name_ar' => $request->input('name_ar'),

                'description_en' => $request->input('description_en'),
                'description_ar' => $request->input('description_ar'),
                'align' => $align,
                'img_path' => $img_path
            ]);
            Session()->put('msg', 'تم اضافة العنصر بنجاح');
            return redirect(route('services.index',$request->input('category')));
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
        $cat = Category::all();
        $service = Services::where('id',$id)->get();
        return view('admin.pages.services.edit',['service'=>$service , 'cat'=>$cat]);
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
        Services::where('id',$id)->update([
            'category_id' => $request->input('category'),
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'description_en' => $request->input('description_en'),
            'description_ar' => $request->input('description_ar'),
        ]);
        if($request->hasFile('file')) {
            $cat = Services::find($id);
            $file_path = public_path("storage/".$cat->img_path);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            
            $this->validate($request, [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            //return $file."</br>".$fileName;
            
            $file->storeAs('public/Services',time().'.'.$fileName);
            $img_path = 'Services/'.time().'.'.$fileName;

            Services::where('id',$id)->update([
                'img_path' => $img_path
            ]);
        }
        Session()->put('msg', 'تم تعديل العنصر بنجاح');
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
        $cat = Services::find($id);
        $file_path = public_path("storage/".$cat->img_path);
        if(File::exists($file_path)){
            File::delete($file_path);
        }

        $cat->delete();
        Session()->put('msg', 'تم حذف المشروع بنجاح');
        return redirect(route('category.index'));
    }
}
