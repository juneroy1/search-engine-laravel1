<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieModel;
class MovieController extends Controller
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
         $movies = MovieModel::all();
        return view('movie.index', ['movies' => $movies]);
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
        $program = MovieModel::create($data);

        if ($program) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating movie failed to create!');
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
         $movie = MovieModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $movie
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
         $movie = MovieModel::find($id);
        
        return view('movie.edit', [
            'movie' => $movie
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
         $movie = MovieModel::find($id);
        $movie->name = $request->name;
        $movie->details = $request->details;
        $movie->save();

         if ($movie) {
            # code...
            return redirect('/movie')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating movie failed to create!');
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
         $movie = MovieModel::find($id);
        $movie->delete();
        if ($movie) {
            # code...
            return redirect('/movie')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting movie failed to create!');
    }
}
