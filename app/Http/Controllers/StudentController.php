<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ViewStudentsModel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
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
        $students = ViewStudentsModel::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //not used for now
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
          try {
            $data = $request->except('_token');
        
                $id = null;
                if (Auth::id()) {
                $id = Auth::id();
                }
                //  dd($id)   ;
                $student = User::create(
                    [
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'middle_name' => $data['middle_name'],
                        'address' => $data['address'],
                        'description' => $data['description'],
                        'type' => 'student',
                        'position' => 'student',
                        'birthdate' => $data['birthdate'],
                        'email' => $data['email'],
                        'password' => '',
                        'creator_id' => $id,
                    ]
                );

                if ($student) {
                    # code...
                    DB::commit();
                    return back()->with('success','Item created successfully!');
                }
                    DB::rollBack();
                    return back()->with('error','Creating student failed to create!');

            } catch (Throwable $e) {
                DB::rollBack();
                return back()->with('error','Creating student failed to create!');

            }
        

           
        
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
         $student = User::find($id);
        
        return view('students.edit', [
            'student' => $student
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
        // dd('put');
        $student = User::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->middle_name = $request->middle_name;
        $student->address = $request->address;
        $student->birthdate = $request->birthdate;
        $student->email = $request->email;
        $student->description = $request->description;
        $student->save();

         if ($student) {
            # code...
            return redirect('/student')->with('success','Item updated successfully!');
        }

            return back()->with('error','Updating student failed to create!');
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
        // dd('delete');
        $student = User::find($id);
        $student->delete();
        if ($student) {
            # code...
            return redirect('/student')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting student failed to create!');
    }
}
