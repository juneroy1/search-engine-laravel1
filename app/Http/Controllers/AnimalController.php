<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnimalModel;
class AnimalController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    
    public function index()
    {
        //
        $animals = AnimalModel::all();
        return view('animal.index', ['animals' => $animals]);
    }

   
    public function store(Request $request)
    {
        //
         $data = $request->except('_token');
        $animal = AnimalModel::create($data);

        if ($animal) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating animal failed to create!');

    }

    public function show($id)
    {
        //
        $animal = AnimalModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $animal
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
         $animal = AnimalModel::find($id);
        
        return view('animal.edit', [
            'animal' => $animal
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
         $animal = AnimalModel::find($id); // select * fro animals where id = $id;
        $animal->name = $request->name;  
        $animal->details = $request->details;
        $animal->save();

         if ($animal) {
            # code...
            return redirect('/animal')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating animal failed to create!');
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
        $animal = AnimalModel::find($id); //SELECT * FROM animals where id = $id;
        $animal->delete(); //DELETE FROM animals where id = $id;
        if ($animal) {
            # code...
            return redirect('/animal')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting animal failed to create!');
    }

}
