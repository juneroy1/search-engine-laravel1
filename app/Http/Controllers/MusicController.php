<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicModel;
class MusicController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    public function index()
    {
        //
        $musics = MusicModel::all();
        return view('music.index', ['musics' => $musics]);
    }

   
    public function store(Request $request)
    {
        //
         $data = $request->except('_token');
        $music = MusicModel::create($data);

        if ($music) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating music failed to create!');

    }

    public function show($id)
    {
        //
        $music = MusicModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $music
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
         $music = MusicModel::find($id);
        
        return view('music.edit', [
            'music' => $music
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
         $music = MusicModel::find($id);
        $music->name = $request->name;
        $music->details = $request->details;
        $music->save();

         if ($music) {
            # code...
            return redirect('/music')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating music failed to create!');
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
         $music = MusicModel::find($id);
        $music->delete();
        if ($music) {
            # code...
            return redirect('/music')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting music failed to create!');
    }
}
