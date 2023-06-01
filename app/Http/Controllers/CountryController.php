<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;

class CountryController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
     public function index()
    {
        //
        $countries = CountryModel::all();
        return view('country.index', ['countries' => $countries]);
    }

   
    public function store(Request $request)
    {
        //
         $data = $request->except('_token');
        $country = CountryModel::create($data);

        if ($country) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating country failed to create!');

    }

    public function show($id)
    {
        //
        $country = CountryModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $country
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
         $country = CountryModel::find($id);
        
        return view('country.edit', [
            'country' => $country
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
         $country = CountryModel::find($id);
        $country->name = $request->name;
        $country->details = $request->details;
        $country->save();

         if ($country) {
            # code...
            return redirect('/country')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating country failed to create!');
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
         $country = CountryModel::find($id);
        $country->delete();
        if ($country) {
            # code...
            return redirect('/country')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting country failed to create!');
    }
}
