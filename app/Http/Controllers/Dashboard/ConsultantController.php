<?php

namespace App\Http\Controllers\Dashboard;

use App\Available;
use App\Consultant;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConsultantRequest;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultants = Consultant::all();
        return view('dashboard.consultants.index',compact('consultants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.consultants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConsultantRequest $request)
    {
        //CreateConsultantRequest
        // dd($request->all());

        $data = $request->except(['image','availables','location','address','days']);
        
        $data['image'] = upload_image_without_resize('consultants',$request->image);
        
        $consultant = Consultant::create($data);

        if($request->days){
            foreach ($request->days as $day => $times) {
                foreach ($times as $key => $time) {
                    $consultant->availables()->create([
                        'available_date' => $day ,
                        'available_time' => $time,
                    ]);
                }

            }
        }



        // if($request->availables){
        //     foreach ($this->process_availables($request) as $available) {
        //         $consultant->availables()->create($available);
        //     }
        // }

        return redirect()->back()->with('success','تمت الإضافة بنجاح');

    }

    function process_availables(Request $request){
        $data = [];
        foreach ($request->availables as $key => $available) {
            $data[$key]['available_date'] = $available['available_date'];
            $data[$key]['available_time'] = $available['available_time'];
        }
        return $data;
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
    public function edit(Consultant $consultant)
    {
        // return $consultant->availables;
        return view('dashboard.consultants.edit',compact('consultant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultant $consultant)
    {
        // dd($request->all());
        $data = $request->except(['image','availables','old_availables','location','address','days']);
        
        if ($request->image) {
            delete_image('consultants',$consultant->iamge);
            $data['image'] = upload_image_without_resize('consultants',$request->image);
        }
        

        if($request->availables){
            foreach ($this->process_availables($request) as $available) {
                $consultant->availables()->create($available);
            }
        }

        $consultant->update($data);


        if($request->days){
            foreach ($consultant->availables as $available) {
                $available->delete();
            }
            foreach ($request->days as $day => $times) {
                foreach ($times as $key => $time) {
                    $consultant->availables()->create([
                        'available_date' => $day ,
                        'available_time' => $time,
                    ]);
                }
            }
        }



        // if($request->old_availables){
        //     foreach ($request->old_availables as $key => $value) {
        //         $av_data = [];
        //         $old_available = Available::find($key);
        //         $av_data['available_date'] = $value['available_date'];
        //         $av_data['available_time'] = $value['available_time'];
        //         $old_available->update($av_data);
        //     }
        // }

        return redirect()->back()->with('success','تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultant $consultant)
    {
        if ($consultant->image != 'default.png' ) {
            delete_image('consultants',$consultant->image);
        }

        $consultant->delete();

        return redirect()->back()->with('success','تم الحذف بنجاح'); 
    }
}
