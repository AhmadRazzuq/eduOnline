<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Role;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index')
            ->with('courses',Course::all())
            ->with('users',User::all());
    }



//    public function courses()
//    {
//
//        return view('users.courses')
//            ->with('users',User::all())->with('roles',Role::all())->with('courses',Course::all());
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create')->with('users',User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'teacher' => 'required'
        ]);
        //dd($request->all());
        $course = Course::create(array(
            'name'=>$request->name,
            'teacher'=>$request->teacher
        ));
        /*
         * TODO
         * remove tow row
         */
        $course->name = $request->name;
        $course->teacher = $request->teacher;
        //$course->users()->attach();
        $course->users()->attach($request->users);
        //$course->users = User::find(0);
        //$course->save();
        //return redirect()->back();

        return view('courses.index')->with('courses',Course::all());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewUsers($id){
        $course = Course::find($id);
        $users = $course->users;
//        $course->delete($id);
        return view('courses.users')->with('users',$users)->with('course',$course);
        //return redirect()->route('categories');
    }

    public function deleteUser($c_id, $u_id){
        $course = Course::find($c_id);
        $users = $course->users;
        $user = $users->where('id',$u_id);
        $user->delete();
        //return redirect()->back();
        return redirect()->route('courses.users');
    }

    public function newCourse()
    {
        return view('courses.teacher.newCourse');
    }

    public function storeCourse(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:courses',
            'image' => 'required|image',
        ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image -> move('uploads/courses/' , $image_new_name);
        $course = Course::create(array(
            "name"=>$request->name,
            "image"    => 'uploads/posts/'.$image_new_name,
            "teacher"=>auth()->user()->name
        ));

        return redirect()->back();
       // return view('courses.teacher.teacherCourse')->with('course',$course);

//        $course->name = $request->name;
//        $course->teacher = $request->teacher;
        //$course->users()->attach();
        //$course->users()->attach($request->users);
        //$course->users = User::find(0);
        //$course->save();
        //return redirect()->back();

        //return view('courses.index')->with('courses',Course::all());


    }
    public function teacherCourse()
    {
        $courses = Course::all();
        //$id = auth()->user()->id;
        $teacher = auth()->user()->name;
//        $id = auth()->user()->id;
//        $user = User::find($id);
//
//        $name = $user->name;
//        $course = Course::where('teacher','=',$name)->first();
        //dd($course->name);

        //dd($course);
        return view('courses.teacher.teacherCourse')->with('courses',$courses)->with('teacher',$teacher);
    }

}
