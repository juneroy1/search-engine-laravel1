<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ViewTeachersModel;

use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = ViewTeachersModel::all();
        return view('teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        DB::beginTransaction();
        $data = $request->except('_token');
        $id = null;
        if (Auth::id()) {
           $id = Auth::id();
        }
        //  dd($data);
        $student = User::create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'middle_name' => $data['middle_name'],
                'address' => $data['address'],
                'description' => $data['description'],
                'type' => 'teacher',
                'position' => 'teacher',
                'birthdate' => $data['birthdate'],
                'email' => $data['email'],
                'password' => '',
                'creator_id' => $id,
            ]
        );

        if ($student) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating teacher failed to create!');

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
        $student =User::find($id);

        return view('view',[
            'result' => $student
        ]); 
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
         $teacher = User::find($id);
        
        return view('teacher.edit', [
            'teacher' => $teacher
        ]);
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
         $teacher = User::find($id);
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->middle_name = $request->middle_name;
        $teacher->address = $request->address;
        $teacher->birthdate = $request->birthdate;
        $teacher->email = $request->email;
        $teacher->description = $request->description;
        $teacher->save();

         if ($teacher) {
            # code...
            return redirect('/teacher')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating teacher failed to create!');
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
         $teacher = User::find($id);
        $teacher->delete();
        if ($teacher) {
            # code...
            return redirect('/teacher')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting teacher failed to create!');
    }
}
