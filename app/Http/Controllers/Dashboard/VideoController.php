<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('dashboard.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO:: validate request
        $data = $request->except('project_videoable_id','article_videoable_id');
        // $data = $request->all();
        $data['videoable_id'] = $request->videoable_type == null ? null :  ($request->videoable_type == "App\Project" ? $request->project_videoable_id : $request->article_videoable_id)  ;
        // dd($data);
        Video::create($data);
        return redirect()->back()->with('success','تم إضافة فيديو بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('dashboard.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //TODO:: validate request
        $data = $request->except('project_videoable_id','article_videoable_id');
        // $data = $request->all();
        $data['videoable_id'] = $request->videoable_type == null ? null :  ($request->videoable_type == "App\Project" ? $request->project_videoable_id : $request->article_videoable_id)  ;
        // dd($data);
        $video->update($data);
        return redirect()->back()->with('success','تم تعديل فيديو بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return 'done';
    }
}
