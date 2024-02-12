<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientsController extends Controller
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
    public function index()
    {
        $clients = Clients::orderBy('order_num','ASC')->get();
        return view('admin.pages.clients.index')->with('clients',$clients);
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
        $messages = [
            'dimensions' => 'Image dimensions must be width: 949px and height: 824px.',
        ];
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=949,height=824',
        ], $messages);

        $clients = Clients::latest()->first();

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            $file->storeAs('public/Clients',time().'.'.$fileName);
            $img_path = 'Clients/'.time().'.'.$fileName;
            Clients::create([
                'order_num' => $clients['order_num'] + 1 ,
                'name' => $request->input('name'),
                'name_ar' => $request->input('name_ar'),
                'website' => $request->input('website'),
                'img_path' => $img_path
            ]);
            Session()->put('msg', 'تم اضافة العميل بنجاح');
            return back();
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
        $client = Clients::where('id',$id)->get();
        return view('admin.pages.clients.edit')->with('client',$client);
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
        Clients::where('id',$id)->update([
            'name' => $request->input('name'),
            'name_ar' => $request->input('name_ar'),
            'website' => $request->input('website'),
        ]);
        
        if($request->hasFile('file')) {
            $cat = Clients::find($id);
            $file_path = public_path("storage/".$cat->img_path);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $messages = [
                'dimensions' => 'Image dimensions must be width: 949px and height: 824px.',
            ];
            $this->validate($request, [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=949,height=824',
            ], $messages);
    
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            $file->storeAs('public/Clients',time().'.'.$fileName);
            $img_path = 'Clients/'.time().'.'.$fileName;

            Clients::where('id',$id)->update([
                'img_path' => $img_path
            ]);
        }
        Session()->put('msg', 'تم تعديل العميل بنجاح');
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
        $client = Clients::where('id',$id)->get();
        $otherclients = Clients::where('id','>',$id)->get();
        
        foreach($otherclients as $otherclients){
            Clients::where('id',$otherclients->id)->update([
                'order_num' => $otherclients->order_num - 1
            ]);
        }
        
        
        $client = Clients::find($id);
        $file_path = public_path("storage/".$client->img_path);
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        $client->delete();
        Session()->put('msg', 'تم حذف العميل بنجاح');
        return redirect(route('clients.index'));
    }


    public function changeOrder(Request $request,$id)
    {
        $thisclient = Clients::where('id',$id)->get();
        
        
        switch ($request->input('changeOrder')) {
            case 'up':
                $above = Clients::where('order_num',$thisclient[0]['order_num'] - 1 )->get();
                
                $newOrderOfAbove = $thisclient[0]['order_num'];
                $newOrderOfThis = $thisclient[0]['order_num'] - 1;

                Clients::where('id',$id)->update([
                    'order_num' => $newOrderOfThis,
                ]);
                Clients::where('id',$above[0]['id'])->update([
                    'order_num' => $newOrderOfAbove,
                ]);
                break;
                

            case 'down':
                $below = Clients::where('order_num',$thisclient[0]['order_num'] + 1 )->get();

                $newOrderOfBelow = $thisclient[0]['order_num'];
                $newOrderOfThis = $thisclient[0]['order_num'] + 1;

                Clients::where('id',$id)->update([
                    'order_num' => $newOrderOfThis,
                ]);
                Clients::where('id',$below[0]['id'])->update([
                    'order_num' => $newOrderOfBelow,
                ]);
                break;


            case 'first':
                $upper = Clients::where('order_num','<',$thisclient[0]['order_num'])->get();

                foreach($upper as $upper){
                    Clients::where('id',$upper->id)->update([
                        'order_num' => $upper->order_num + 1
                    ]);
                }
                $newOrderOfBelow = $thisclient[0]['order_num'] + 1;
                $newOrderOfThis = 1;

                Clients::where('id',$id)->update([
                    'order_num' => $newOrderOfThis,
                ]);
                Clients::where('id',$upper[0]['id'])->update([
                    'order_num' => $newOrderOfBelow,
                ]);
                break;

        }
        return redirect(route('clients.index'));
    }

}
