<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Course;
use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.courses.index',compact('courses'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $instructors = Instructor::all();

        return view('dashboard.courses.create',compact('categories','instructors'));       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        // dd($request->all());
        $data = $request->except(['features']);
        $data['image'] = upload_image_without_resize('courses',$request->image);
        $data['user_id'] = auth()->user()->id;

        $course = Course::create($data);

        if($request->features){
            foreach ($this->process_features($request) as $feature) {
                $course->features()->create($feature);
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
    public function edit(Course $course)
    {

        $categories = Category::all();
        $instructors = Instructor::all();

        return view('dashboard.courses.edit',compact('categories','course','instructors'));       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request,Course $course)
    {
        $course_data = $request->except('_token','image','features','old_features');

        if($request->image){
            if ($course->image != 'default.png' ) {
                delete_image('courses',$course->image);
            }
            $course_data['image'] = upload_image_without_resize('courses',$request->image);
        }

        $course->update($course_data);


        if($request->features){
            foreach ($this->process_features($request) as $feature) {
                $course->features()->create($feature);
            }
        }
        
        if($request->old_features){
            foreach ($request->old_features as $key => $value) {
                $data = [];
                $old_inv = Feature::find($key);
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
    public function destroy(Course $course)
    {
        if ($course->image != 'default.png' ) {
            delete_image('courses',$course->image);
        }
        $course->delete();
        return redirect()->back()->with('success','تم الحذف بنجاح');
    }
}
