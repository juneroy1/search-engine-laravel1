<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgrammingModel;
class ProgrammingController extends Controller
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
        $programs = ProgrammingModel::all();
        return view('programming.index', ['programs' => $programs]);
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
         $data = $request->except('_token');
        $program = ProgrammingModel::create($data);

        if ($program) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating programming failed to create!');

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
        $program = ProgrammingModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $program
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
         $programming = ProgrammingModel::find($id);
        
        return view('programming.edit', [
            'programming' => $programming
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
         $programming = ProgrammingModel::find($id);
        $programming->name = $request->name;
        $programming->details = $request->details;
        $programming->save();

         if ($programming) {
            # code...
            return redirect('/programming')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating programming failed to create!');
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
         $programming = ProgrammingModel::find($id);
        $programming->delete();
        if ($programming) {
            # code...
            return redirect('/programming')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting programming failed to create!');
    }
}
