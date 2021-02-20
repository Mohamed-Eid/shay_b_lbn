<?php

namespace App\Http\Controllers\Dashboard;

use App\CompanyHeighlight;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function contact(){
        return view('dashboard.settings.contact');
    }
    public function about(){
        return view('dashboard.settings.about');
    }
    public function home(){
        return view('dashboard.settings.home');
    }

    
    private function process_heighlights(Request $request){
        $data = [];
        foreach ($request->company_heighlights as $key => $investigation) {
            $data[$key]['ar']['name'] = $investigation['ar_name'];
            $data[$key]['en']['name'] = $investigation['en_name'];
            $data[$key]['image']      = upload_image_without_resize('settings',$investigation['image']);
            $data[$key]['type']       = $request->h_type;
        }
        return $data;
    }
    private function process_slider(Request $request){
        $data = [];
        foreach ($request->slider as $key => $slider_img) {
            $data[$key]['image']      = upload_image_without_resize('slider',$slider_img['image']);
        }
        return $data;
    }
    public function update(Request $request){
        // dd($request->all());
        foreach ($request->except(['_token','_method','company_heighlights','old_heighlights','h_type','slider','old_slider']) as $key => $value) {
            //dd($key);
            $setting = Setting::find($key);
            if($setting->type == "image"){
                delete_image('settings',$setting->one_value);
                $value['one_value'] = upload_image_without_resize('settings',$value['one_value']);
            }
            if(isset($value['image'])){
                delete_image('settings',$setting->image);
                $value['image'] = upload_image_without_resize('settings',$value['image']);
            }
            $setting->update($value);
        }

        if($request->company_heighlights){
            foreach ($this->process_heighlights($request) as $investigation) {
                CompanyHeighlight::create($investigation);
            }
        }
        if($request->slider){
            foreach ($this->process_slider($request) as $slide_img) {
                Slider::create($slide_img);
            }
        }

        if($request->old_slider){
            foreach ($request->old_slider as $key => $value) {
                $data = [];

                $old_slider = Slider::find($key);

                if(isset($value['image'])){
                    delete_image('slider', $old_slider->image);
                    $data['image'] = upload_image_without_resize('slider',$value['image']);
                }
                $old_slider->update($data);
            }
        }

        if($request->old_heighlights){
            foreach ($request->old_heighlights as $key => $value) {
                $data = [];

                $old_heighlight = CompanyHeighlight::find($key);

                $data['ar']['name'] = $value['ar_name'];
                $data['en']['name'] = $value['en_name'];
                if(isset($value['image'])){
                    delete_image('settings', $old_heighlight->image);
                    $data['image'] = upload_image_without_resize('settings',$value['image']);
                }
                $dd[] = $data;
                $old_heighlight->update($data);
            }
        }

        session()->flash('success', 'تم الحفظ بنجاح');
        return redirect()->back();
    }
}
