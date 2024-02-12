<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $slider = Slider::all();
        return view('admin.pages.main-slider.index')->with('slider',$slider);
    }

    public function create(Request $request)
    {
        $messages = [
            'dimensions' => 'Image dimensions must be width: 2445px and height: 1241px',
        ];
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=2445,height=1241',
        ], $messages);

        $file = new Slider();
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $mimetype = $file->getMimeType();
            $fileName = $file->getClientOriginalName();
            
            //return $file."</br>".$extension."</br>".$mimetype."</br>".$fileName;
            
            // first method to store
            // $path = $file->store('Slider');
            // second method
            $file->storeAs('public/Slider',time().'.'.$fileName);
            $img_path = 'Slider/'.time().'.'.$fileName;
            Slider::create([
                'img_path' => $img_path
            ]);
            Session()->put('msg', 'تم رفع الملف بنجاح');
            return back();
        }
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $file_path = public_path("storage/".$slider->img_path);
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        
        $slider->delete();
        Session()->put('msg', 'تم حذف الصورة بنجاح');
        return back();
    }
}
