<?php

namespace App\Http\Controllers\Dashboard;

use App\Event;
use App\EventFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Instructor;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('dashboard.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = Instructor::all();
        return view('dashboard.events.create',compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $data = $request->except(['features']);
        $data['image'] = upload_image_without_resize('events',$request->image);
        $data['user_id'] = auth()->user()->id;

        $event = Event::create($data);

        if($request->features){
            foreach ($this->process_features($request) as $feature) {
                $event->event_features()->create($feature);
            }
        }

        return redirect()->back()->with('success','تمت الإضافة بنجاح');
    }

    private function process_features(Request $request){
        $data = [];
        foreach ($request->features as $key => $feature) {
            if($feature['ar_name'] != null && $feature['en_name'] != null){
                $data[$key]['ar']['name'] = $feature['ar_name'];
                $data[$key]['en']['name'] = $feature['en_name'];
                $data[$key]['ar']['description'] = $feature['ar_description'];
                $data[$key]['en']['description'] = $feature['en_description'];                
            }
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

    public function edit(Event $event)
    {
        $instructors = Instructor::all();
        return view('dashboard.events.edit',compact('instructors','event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event_data = $request->except('_token','image','features','old_features');

        if($request->image){
            if ($event->image != 'default.png' ) {
                delete_image('events',$event->image);
            }
            $event_data['image'] = upload_image_without_resize('events',$request->image);
        }

        $event->update($event_data);


        if($request->features){
            foreach ($this->process_features($request) as $feature) {
                $event->event_features()->create($feature);
            }
        }
        
        if($request->old_features){
            foreach ($request->old_features as $key => $value) {
                $data = [];
                $old_inv = EventFeature::find($key);
                if($value['ar_name'] != null && $value['en_name'] != null){
                    $data['ar']['name'] = $value['ar_name'];
                    $data['en']['name'] = $value['en_name'];
                    $data['ar']['description'] = $value['ar_description'];
                    $data['en']['description'] = $value['en_description'];                
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
    public function destroy(Event $event)
    {
        if ($event->image != 'default.png' ) {
            delete_image('events',$event->image);
        }
        $event->delete();
        return redirect()->back()->with('success','تم الحذف بنجاح');
    }
}
