<?php

namespace App\Http\Controllers\Dashboard;

use App\Branch;
use App\Category;
use App\Course;
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
        $branches   = Branch::all();
        $instructors = Instructor::all();

        return view('dashboard.courses.create',compact('categories','branches','instructors'));       
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
        $data = $request->all();
        $data['image'] = upload_image_without_resize('courses',$request->image);
        $data['user_id'] = auth()->user()->id;

        $course = Course::create($data);

        //TODO::make many to many relations

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
    public function edit(Course $course)
    {

        $categories = Category::all();
        $branches   = Branch::all();
        $instructors = Instructor::all();

        return view('dashboard.courses.edit',compact('categories','course','branches','instructors'));       

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
        $course_data = $request->except('_token','image');

        if($request->image){
            if ($course->image != 'default.png' ) {
                delete_image('courses',$course->image);
            }
            $course_data['image'] = upload_image_without_resize('courses',$request->image);
        }

        $course->update($course_data);

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
