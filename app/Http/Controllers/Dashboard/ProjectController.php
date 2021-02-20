<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Investigation;
use App\Project;
use App\Video;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {

        $project_data = $request->except('_token','investigations','videos','image','header');
        $project_data['image'] = upload_image_without_resize('projects',$request->image);
        $project_data['header'] = upload_image_without_resize('projects',$request->header);
        $project = Project::create($project_data);

        //TODO:: validate investigations , videos
        if($request->investigations){
            foreach ($this->process_investigations($request) as $investigation) {
                $project->investigations()->create($investigation);
            }
        }
        
        if($request->videos){
            foreach ($this->process_videos($request) as $video) {
                $project->videos()->create($video);
            }
        }

        return redirect()->back()->with('success','تمت الإضافة بنجاح');
        
    }

    private function process_videos(Request $request){
        $data = [];
        foreach ($request->videos as $key => $video) {
            $data[$key]['ar']['name'] = $video['ar_name'];
            $data[$key]['en']['name'] = $video['en_name'];
            $data[$key]['url']        = $video['url'];
        }
        return $data;
    }
    private function process_investigations(Request $request){
        $data = [];
        foreach ($request->investigations as $key => $investigation) {
            $data[$key]['ar']['name'] = $investigation['ar_name'];
            $data[$key]['en']['name'] = $investigation['en_name'];
            $data[$key]['image']      = upload_image_without_resize('investigations',$investigation['image']);
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
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
        $project_data = $request->except('_token','investigations','videos','image','header','old_investigations','old_videos');
        if($request->image){
            $project_data['image'] = upload_image_without_resize('projects',$request->image);
        }
        if($request->header){
            $project_data['header'] = upload_image_without_resize('projects',$request->header);
        }
        
        $project->update($project_data);

        //TODO:: validate investigations , videos
        if($request->investigations){
            foreach ($this->process_investigations($request) as $investigation) {
                $project->investigations()->create($investigation);
            }
        }
        
        if($request->old_investigations){
            foreach ($request->old_investigations as $key => $value) {
                $data = [];
                $old_inv = Investigation::find($key);
                $data['ar']['name'] = $value['ar_name'];
                $data['en']['name'] = $value['en_name'];
                if(isset($value['image'])){
                    if ($old_inv->image != 'default.png' ) {
                        delete_image('investigations', $old_inv->image);
                    }
                    $data['image'] = upload_image_without_resize('investigations',$value['image']);
                }
                $old_inv->update($data);
            }
        }
        
        if($request->videos){
            foreach ($this->process_videos($request) as $video) {
                $project->videos()->create($video);
            }
        }

        if($request->old_videos){
            foreach ($request->old_videos as $key => $value) {
                $data = [];
                $old_video = Video::find($key);
                $data['ar']['name'] = $value['ar_name'];
                $data['en']['name'] = $value['en_name'];
                $data['url']        = $value['url'];
                $old_video->update($data);
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
    public function destroy(Project $project)
    {
        if ($project->image != 'default.png' ) {
            delete_image('projects',$project->image);
        }

        if ($project->header != 'default.png' ) {
            delete_image('projects',$project->header);
        }

        foreach ($project->investigations as $investigation) {
            if ($investigation->image != 'default.png' ) {
                delete_image('investigations',$investigation->image);
            }
        }

        $project->delete();

        return redirect()->back()->with('success','تم الحذف بنجاح');   
    }
}
