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
        // DD('DADADA');
        //
        $students = User::where('type','=','student')->orderBy('last_name', 'DESC')->get();
        
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

                $first_name = $data['first_name'];
                $last_name = $data['last_name'];
                $middle_name = $data['middle_name'];
                $address = $data['address'];
                $description = $data['description'];
                $type = 'student';
                $position = 'student';
                $birthdate = $data['birthdate'];
                $email = $data['email'];
                $category = 'user';
                $creator_id = $id;
                $number_of_times_update = 1;
                $password = '';

                //  dd($id)   ;
                $insert = \DB::statement(
                    "CALL insert_user_student(?,?,?,?,?,?,?,?,?,?,?,?)",[
                            $first_name,
                            $last_name,
                            $middle_name,
                            $address,
                            $description,
                            $type,
                            $position,
                            $birthdate,
                            $email,
                            $category,
                            $creator_id,
                            $number_of_times_update,
                        ]
                    );
                if ($insert) {
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
    public function edit(int $id)
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
        
        $data = $request->except('_token');

                $creator_id = null;
                if (Auth::id()) {
                $creator_id = Auth::id();
                }
                $first_name = $data['first_name'];
                $last_name = $data['last_name'];
                $middle_name = $data['middle_name'];
                $address = $data['address'];
                $description = $data['description'];
                $type = 'student';
                $position = 'student';
                $birthdate = $data['birthdate'];
                $category = 'user';
                $creator_id = $creator_id;
                $email = $data['email'];

                //  dd($id)   ;
                $update = \DB::statement(
                    "CALL update_user_student(?,?,?,?,?,?,?,?,?,?,?,?)",[
                            $id,
                            $first_name,
                            $last_name,
                            $middle_name,
                            $address,
                            $description,
                            $type,
                            $position,
                            $birthdate,
                            $category,
                            $creator_id,
                            $email
                        ]
                    );

                

         if ($update) {
            // update the number_of_times_update column here
            $finduser = User::find($id);
            \DB::statement('CALL incrementNumberOfUpdates(?, @result)', [$finduser->number_of_times_update]);
            $result = \DB::select('SELECT @result AS result')[0]->result;

            $finduser->number_of_times_update = $result;
            $finduser->save();

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
        // before we update the data we need to update first so that we can get the id of the user who deleted the data.
        $who_deleted_id = null;
        if (Auth::id()) {
            $who_deleted_id = Auth::id();
        }

        $update = User::find($id);
        $update->who_delete_id = $who_deleted_id;
        $update->save();

        $delete = \DB::statement('CALL delete_user_student(?)', [$id]);
        if ($delete) {
            # code...
            return redirect('/student')->with('success','Item deleted successfully!');
        }

            return back()->with('error','Deleting student failed to create!');
    }
}
