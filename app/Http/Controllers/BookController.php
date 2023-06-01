<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;

class BookController extends Controller
{
    // meaning only a show function can access publicly
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
     public function index()
    {
        //
        $books = BookModel::all();
        return view('book.index', ['books' => $books]);
    }

   
    public function store(Request $request)
    {
        //
         $data = $request->except('_token');
        $book = BookModel::create($data);

        if ($book) {
            # code...
            return back()->with('success','Item created successfully!');
        }

            return back()->with('error','Creating book failed to create!');

    }

    public function show($id)
    {
        //
        $book = BookModel::find($id);
        // dd($program->id);
        return view('view',[
            'result' => $book
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
         $book = BookModel::find($id);
        
        return view('book.edit', [
            'book' => $book
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
         $book = BookModel::find($id);
        $book->name = $request->name;
        $book->details = $request->details;
        $book->save();

         if ($book) {
            # code...
            return redirect('/book')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating book failed to create!');
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
