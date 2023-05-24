<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolModel;

class SchoolController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
   public function index()
    {
        //
        $schools = SchoolModel::all();
        return view('school.index', ['schools' => $schools]);
    }

   
    public function store(Request $request)
    {
        //
         $data = $request->except('_token');
        $school = SchoolModel::create($data);

        if ($school) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating school failed to create!');

    }

    public function show($id)
    {
        //
        $school = SchoolModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $school
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
         $school = SchoolModel::find($id);
        
        return view('school.edit', [
            'school' => $school
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
         $school = SchoolModel::find($id);
        $school->name = $request->name;
        $school->details = $request->details;
        $school->save();

         if ($school) {
            # code...
            return redirect('/school')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating school failed to create!');
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
         $school = SchoolModel::find($id);
        $school->delete();
        if ($school) {
            # code...
            return redirect('/school')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting school failed to create!');
    }
}
