<?php

namespace App\Http\Controllers\Dashboard;

use App\Gallary;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallaries = Gallary::all();
        return view('dashboard.gallaries.index',compact('gallaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO::validate request
        $gallary_data = $request->except('_token','image','images');
        $gallary_data['image'] = upload_image_without_resize('gallaries',$request->image);
        $gallary = Gallary::create($gallary_data);

        if($request->images){
            foreach ($request->images as $image) {
                $gallary->images()->create([
                    'image' => upload_image_without_resize('gallaries',$image["image"])
                ]);
            }
        }
        
        return redirect()->back()->with('success','تمت الإضافة بنجاح');
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
    public function edit(Gallary $gallary)
    {
        return view('dashboard.gallaries.edit',compact('gallary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallary $gallary)
    {
        $gallary_data = $request->except('_token','image','images','old_images');
        if($request->image){
            delete_image('gallaries', $gallary->image);
            $gallary_data['image'] = upload_image_without_resize('gallaries',$request->image);
        }

        
        $gallary->update($gallary_data);

        //TODO:: validate images
        if($request->images){
            foreach ($request->images as $image) {
                $gallary->images()->create([
                    'image' => upload_image_without_resize('gallaries',$image["image"])
                ]);
            }
        }
        
        if($request->old_images){
            foreach ($request->old_images as $key => $value) {
                $data = [];
                $old_inv = Image::find($key);

                if(isset($value['image'])){
                    if ($old_inv->image != 'default.png' ) {
                        delete_image('gallaries', $old_inv->image);
                    }
                    $data['image'] = upload_image_without_resize('gallaries',$value['image']);
                }
                $old_inv->update($data);
            }
        }



        return redirect()->back()->with('success','تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallary $gallary)
    {
        if ($gallary->image != 'default.png' ) {
            delete_image('gallaries',$gallary->image);
        }


        foreach ($gallary->images as $image) {
            if ($image->image != 'default.png' ) {
                delete_image('gallaries',$image->image);
            }
        }

        $gallary->delete();

        return redirect()->back()->with('success','تم الحذف بنجاح');   
    }
}
