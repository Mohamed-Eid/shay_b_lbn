<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInstructorRequest;
use App\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();

        return view('dashboard.instructors.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.instructors.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInstructorRequest $request)
    {
        $data = $request->except(['image']);

        if($request->has('image')){
            $data['image'] = upload_image_without_resize('instructors',$request->image);
        }
        Instructor::create($data);
        return redirect()->back()->with('success','تم إضافة مدرب بنجاح');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        return view('dashboard.instructors.edit',compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Instructor $instructor)
    {
        $data = $request->except(['image']);

        if($request->has('image')){
            if($instructor->image != "instructor.png")
                delete_image('instructors',$instructor->image);
            $data['image'] = upload_image_without_resize('instructors',$request->image);
        }
        $instructor->update($data);

        return redirect()->back()->with('success','تم تعديل مدرب بنجاح');    
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        if($instructor->image != "instructor.png")
            delete_image('instructors',$instructor->image);

        $instructor->delete();
        return redirect()->back()->with('success','تم حذف مدرب بنجاح');    
    }
}
