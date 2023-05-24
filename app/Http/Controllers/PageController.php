<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgrammingModel;
use App\Models\ColorModel;
use App\Models\MovieModel;
use App\Models\User;
use App\Models\AnimalModel;
use App\Models\BookModel;
use App\Models\MusicModel;
use App\Models\SchoolModel;
use App\Models\CountryModel;
use App\Models\ApplicationModel;
use App\Models\HistoryModel;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function welcome(){
        return view('welcome',[
            'histories' => Auth::id()? HistoryModel::all():false,
        ]);
    }
    public function results(Request $request){
            
        $result = $request->get('result');  // $_GET['results']; same ani
        $query = [];
        if ($result) {
            
            if (Auth::id()) {
                $find = HistoryModel::where('search', '=', $result)->first();
                if (!$find) {
                   $id = Auth::id();
                $history = new HistoryModel;
                $history->search = $result;
                $history->user_id = $id;
                $history->save();
                }
                
            }

            // search by category or by specific search key word using linear search
            // teacher
            if ($result == 'teacher' || $result == 'teachers' || $result == 'list of teacher' || $result == 'list of teachers' ) {
                $query = User::where('type','=', 'teacher')->get();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }

            // search by category or by specific search key word using linear search
            // student 
             if ($result == 'student' || $result == 'students' || $result == 'list of student' || $result == 'list of students' ) {
                $query = User::where('type','=', 'student')->get();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }

            // search by category or by specific search key word using linear search
            // application /
            if ($result == 'application' || $result == 'applications' || $result == 'list of application' || $result == 'list of applications' ) {
                $query = ApplicationModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }

            // search by category or by specific search key word using linear search
            // programming /
            if ($result == 'programming'  || $result == 'list of programming' ) {
                $query = ProgrammingModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }


            // search by category or by specific search key word using linear search
            // books  /
            if ($result == 'book' || $result == 'books' || $result == 'list of book' || $result == 'list of books' ) {
                $query = BookModel::all();
                    return view('results',[ 
                    'results' => $query,
                    'search' => $result,
                    ]);
            }

            // search by category or by specific search key word using linear search
            // animal /
            if ($result == 'animal' || $result == 'animals' || $result == 'list of animal' || $result == 'list of animals' ) {
                $query = AnimalModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }

            // search by category or by specific search key word using linear search
            // country /
            if ($result == 'country' || $result == 'countries' || $result == 'list of country' || $result == 'list of countries' ) {
                $query = CountryModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }
            

            // search by category or by specific search key word using linear search
            // colors /
            if ($result == 'color' || $result == 'colors' || $result == 'list of colors' || $result == 'list of color' ) {
                $query = ColorModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }

            // search by category or by specific search key word using linear search
            // movies /
            if ($result == 'movie' || $result == 'movies' || $result == 'list of movies' || $result == 'list of movie' ) {
                $query = MovieModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }
            // music /

            if ($result == 'music' || $result == 'musics' || $result == 'list of music' || $result == 'list of musics' ) {
                $query = MusicModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }

            // search by category or by specific search key word using linear search
            // schools /
            if ($result == 'school' || $result == 'schools' || $result == 'list of school' || $result == 'list of schools' ) {
                $query = SchoolModel::all();
                    return view('results', [
                    'results' => $query,
                    'search' => $result,
                    ]);
            }
            
            // END OF LINEAR SEARCH



            // START OF MERGING SEARCH
            // search any specific search key word in users table and start to merge in $query = []
            $query_student = User::where('first_name', 'like', '%' . $result . '%')
             ->orWhere('last_name', 'like', '%' . $result . '%')
             ->orWhere('middle_name', 'like', '%' . $result . '%')
             ->orWhere('description', 'like', '%' . $result . '%')
             ->orWhere('address', 'like', '%' . $result . '%')
             ->get();
             
             if ($query_student) {
                foreach ($query_student as $student) {
                     array_push($query, $student);   
                }
             }


            // search any specific search key word in programming table and start to merge in $query = []
             $query_programming = ProgrammingModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

            
            if ($query_programming) {
                foreach ($query_programming as $programming) {
                     array_push($query, $programming);   
                }
            }
            
            // search any specific search key word in color table and start to merge in $query = []
            $query_color = ColorModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->get();

             if ($query_color) {
                foreach ($query_color as $color) {
                     array_push($query, $color);   
                }
             }


            // search any specific search key word in application table and start to merge in $query = []
            $query_application = ApplicationModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

            
            if ($query_application) {
                foreach ($query_application as $application) {
                     array_push($query, $application);   
                }
            }


            /**
             * book
             * animal
             * country
             * movie music
             */

            // search any specific search key word in book table and start to merge in $query = []
             $query_book = BookModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

           
            if ($query_book) {
                foreach ($query_book as $book) {
                     array_push($query, $book);   
                }
            }


            // search any specific search key word in animal table and start to merge in $query = []
             $query_animal = AnimalModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

            
            if ($query_animal) {
                foreach ($query_animal as $animal) {
                     array_push($query, $animal);   
                }
            }

            // search any specific search key word in country table and start to merge in $query = []
             $query_country = CountryModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

            
            if ($query_country) {
                foreach ($query_country as $country) {
                     array_push($query, $country);   
                }
            }

            // search any specific search key word in movie table and start to merge in $query = []
             $query_movie = MovieModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

            
            if ($query_movie) {
                foreach ($query_movie as $movie) {
                     array_push($query, $movie);   
                }
            }

            // search any specific search key word in music table and start to merge in $query = []
            $query_music = MusicModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

           
            if ($query_music) {
                foreach ($query_music as $music) {
                     array_push($query, $music);   
                }
            }

            // search any specific search key word in school table and start to merge in $query = []
            $query_school = SchoolModel::where('name', 'like', '%' . $result . '%')
             ->orWhere('details', 'like', '%' . $result . '%')
             ->orWhere('category', 'like', '%' . $result . '%')->get();

            
            if ($query_school) {
                foreach ($query_school as $school) {
                     array_push($query, $school);   
                }
            }         
            
            
            // END OF MERGING SEARCH

        }
        return view('results', [
            'results' => $query,
            'search' => $result,
            
        ]);
    }
}
