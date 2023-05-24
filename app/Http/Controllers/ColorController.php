<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColorModel;
class ColorController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    
    public function index()
    {
        //
        $colors = ColorModel::all();
        return view('color.index', ['colors' => $colors]);
    }

   
    public function store(Request $request)
    {
        //
         $data = $request->except('_token');
        $program = ColorModel::create($data);

        if ($program) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating color failed to create!');

    }

    public function show($id)
    {
        //
        $color = ColorModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $color
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
         $color = ColorModel::find($id);
        
        return view('color.edit', [
            'color' => $color
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
         $color = ColorModel::find($id);
        $color->name = $request->name;
        $color->details = $request->details;
        $color->save();

         if ($color) {
            # code...
            return redirect('/color')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating color failed to create!');
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
         $color = ColorModel::find($id);
        $color->delete();
        if ($color) {
            # code...
            return redirect('/color')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting color failed to create!');
    }

}
