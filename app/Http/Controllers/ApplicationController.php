<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationModel;

class ApplicationController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    
    public function index()
    {
        //
        $applications = ApplicationModel::all();
        return view('application.index', ['applications' => $applications]);
    }

   
    public function store(Request $request)
    {
        //
         $data = $request->except('_token');
        $application = ApplicationModel::create($data);

        if ($application) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating application failed to create!');

    }

    public function show($id)
    {
        //
        $application = ApplicationModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $application
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
         $application = ApplicationModel::find($id);
        
        return view('application.edit', [
            'application' => $application
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
         $application = ApplicationModel::find($id);
        $application->name = $request->name;
        $application->details = $request->details;
        $application->save();

         if ($application) {
            # code...
            return redirect('/application')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating application failed to create!');
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
         $application = ApplicationModel::find($id);
        $application->delete();
        if ($application) {
            # code...
            return redirect('/application')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting application failed to create!');
    }
}
