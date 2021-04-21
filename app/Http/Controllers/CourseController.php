<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('ViewAny', Course::class);
        $courses=Course::all();
        // $courses is sent to the index.blade.php for looping. When objects are in plural form, we loop. We do not loop singular objects
        return view('course.index', compact('courses'));
        // The Course with a capital C references use App\Models\Course;
        // If you are using a method reference it
        // Linkindex.blade.php with CourseController.php with compact('courses')
        // INSERT data into your database for school system eg Mathematics and English
        // copy paste this link(/course) to yiur <a href=""> code. At index.blade.php page 
        // we cannot compact students here, since in our  student model, one course has one student but one 
        // student has many courses. Since one student has many courses, 
        // we compact courses in the student controller page.
        // return view and $this->authorize is used in CREATE, EDIT, SHOW, INDEX sections. Compact() is in EDIT,SHOW and INDEX
        // return redirect is used in STORE and UPDATE sections
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Course::class);
        return view('course.create');
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
        
        $input=$request->all();
        $course=Course::create($input);
        return redirect('/course/'.$course->id);
        // select all input from form using this code $input=$request->all();. 
        // store data to database using this code $course=Course::create($input);. The model (Course) communicates with the database.
        // Redirect to show page using this code  return redirect('/course/'.$course->id);.
        //  always store and redirect to another page. 
        // Add a lnk in the index page that goes to the create page. 
        // /course/'.$course->id directs to a show page
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
        $course=Course::find($id);
        return view('course.show', compact('course'));
        // write this code $course=Course::find($id)AND return view('course.show', compact('course')); TO LINK SHOW.BLADE.PHP AND INDEX.BLADE.PHP
        
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
        $course=course::find($id);
        return view('course.edit', compact('course'));


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
        $course=Course::find($id);
        // The Course model FINDS the particular course with the given ($id) in the DATABASE. MODELS always link with the DATABASE.
        // When the user edits, he is taken to the update section. The system checks the $id and 
        // updates accordingly. $course=Course::find($id); IS FOUND IN THE UPDATE section and not in the STORE section
        $input=$request->all();
        $course->update($input);
        return redirect('course/'.$course->id);

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

         $course=Course::find($id);
         $course->delete();
         return redirect('/course');
    }
}
