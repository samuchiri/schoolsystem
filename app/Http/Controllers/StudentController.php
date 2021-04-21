<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
// The above 'use' statements MUST be in every model. Eg, the student model has user_id','course_id AS FOREIGN KEYS. So, we use a directory to reflect each field. Eg user_id to represent use App\Models\User; course_id to represent use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $this->authorize('viewAny', Student::class);
         // this is taken to student policy
        $students=Student::all();
        // $students calls all students from the Student model
        $users= User::all();
        // $users calls all users from the User model
        $course= Course::all();
        // $course calls all courses from the course model

        return view('student.index', compact('students','users','course'));
        // compact() is used in INDEX, CREATE and UPDATE. The compacted fields can be used in create.blade.php. To compact() a value, we first have to initialize it as in above. Eg to compact users we initialize $users= User::all();
        

    
        // dd means data dump
    }
    public function welcome(){

        return view('welcome');
        // view is the folder name welcome is the method defined (as @welcome) in web.php
    }


    public function filter(){
        
        return view('student.filter');
        // VIEW is the folder. STUDENT folder is INSIDE VIEW. FILTER refers to filter.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Student::class);
        $users=User::all();
    
        $courses=Course::all();

        return view('student.create',compact('users','courses'));
        // Since one student has many courses, we compact courses in the student controller page in the create() method.
        // Since one student has one user, we compact user in the student controller page in the create() method.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->authorize('create', Student::class);


        $input=$request->all();
       
        $student=Student::create($input);
        return redirect('/student/'.$student->id);

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
        $this->authorize('show', Student::class);

        $student=Student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //

        $this->authorize('update', $student);

      

        return view('student.edit', compact('student'));
        // compact() means SEND THESE VARIABLES TO A GIVEN VIEW
  
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
        $this->authorize('update', Student::class);


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
        $this->authorize('delete',Student::class);

    }
}
