<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleModel;

class SampleController extends Controller
{
    //
    public function submitSampleForm(Request $request){
        // $_POST['title'];
        // $_POST['description'];
        
        // $request->title;
        // $request->description;
        // insert into sample().....
        // insert into sample(title, description) values($request->title, $request->description);
        $createSample = new SampleModel;
        $createSample->title = $request->title;
        $createSample->description = $request->description;
        $createSample->save();

        return 'success';
    }
}
