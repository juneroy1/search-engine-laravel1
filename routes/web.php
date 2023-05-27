<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProgrammingController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SampleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/sample-create-form', function(){
    // return 'testing for testing';
    // return view('')
    // animal/edit.php
    return view('sample');
});

Route::post('/submit-sample',[SampleController::class, 'submitSampleForm']);


// for landing page url ---- first land - search page
Route::get('/', [PageController::class, 'welcome']);


// for results page url
Route::get('/results', [PageController::class, 'results']);


    // url for visiting adding of animal page
    Route::get('animal', [AnimalController::class, 'index']);

    // url for creating new animal
    Route::post('animal', [AnimalController::class, 'store']);

    // url for visiting editing of animal page
    Route::get('animal/{animal}/edit', [AnimalController::class, 'edit']);

    // url for updating animal 
    Route::put('animal/{animal}', [AnimalController::class, 'update']);

    // url for visiting animal details
    Route::get('animal/{animal}', [AnimalController::class, 'show']);

    // url for deleting animal
    Route::delete('animal/{animal}', [AnimalController::class, 'destroy']);


    // application url
    // url for visiting adding of application page
    Route::get('application', [ApplicationController::class, 'index']);

    // url for creating new application
    Route::post('application', [ApplicationController::class, 'store']);

    // url for visiting editing of application page
    Route::get('application/{application}/edit', [ApplicationController::class, 'edit']);

    // url for updating application
    Route::put('application/{application}', [ApplicationController::class, 'update']);

    // url for visiting application details
    Route::get('application/{application}', [ApplicationController::class, 'show']);

    // url for deleting application
    Route::delete('application/{application}', [ApplicationController::class, 'destroy']);


    // book url
    // url for visiting adding of book page
    Route::get('book', [BookController::class, 'index']);

    // url for creating new book
    Route::post('book', [BookController::class, 'store']);

    // url for visiting editing of book page
    Route::get('book/{book}/edit', [BookController::class, 'edit']);

    // url for updating book 
    Route::put('book/{book}', [BookController::class, 'update']);

    // url for visiting book details
    Route::get('book/{book}', [BookController::class, 'show']);

    // url for deleting book
    Route::delete('book/{book}', [BookController::class, 'destroy']);


    // color url
    // url for visiting adding of color page
    Route::get('color', [ColorController::class, 'index']);

    // url for creating new color
    Route::post('color', [ColorController::class, 'store']);

    // url for visiting editing of color page
    Route::get('color/{color}/edit', [ColorController::class, 'edit']);

    // url for updating color
    Route::put('color/{color}', [ColorController::class, 'update']);

    // url for visiting color details
    Route::get('color/{color}', [ColorController::class, 'show']);

    // url for deleting color
    Route::delete('color/{color}', [ColorController::class, 'destroy']);


    // country url
    // url for visiting adding of country page
    Route::get('country', [CountryController::class, 'index']);

    // url for creating new country
    Route::post('country', [CountryController::class, 'store']);

    // url for visiting editing of country page
    Route::get('country/{country}/edit', [CountryController::class, 'edit']);

    // url for updating country 
    Route::put('country/{country}', [CountryController::class, 'update']);

    // url for visiting country details
    Route::get('country/{country}', [CountryController::class, 'show']);

    // url for deleting country
    Route::delete('country/{country}', [CountryController::class, 'destroy']);


    // movie url
    // url for visiting adding of movie page
    Route::get('movie', [MovieController::class, 'index']);

    // url for creating new movie
    Route::post('movie', [MovieController::class, 'store']);

    // url for visiting editing of movie page
    Route::get('movie/{movie}/edit', [MovieController::class, 'edit']);

    // url for updating movie 
    Route::put('movie/{movie}', [MovieController::class, 'update']);

    // url for visiting movie details
    Route::get('movie/{movie}', [MovieController::class, 'show']);

    // url for deleting movie
    Route::delete('movie/{movie}', [MovieController::class, 'destroy']);


    // music url
    // url for visiting adding of music page
    Route::get('music', [MusicController::class, 'index']);

    // url for creating new music
    Route::post('music', [MusicController::class, 'store']);

    // url for visiting editing of music page
    Route::get('music/{music}/edit', [MusicController::class, 'edit']);

    // url for updating music 
    Route::put('music/{music}', [MusicController::class, 'update']);

    // url for visiting music details
    Route::get('music/{music}', [MusicController::class, 'show']);

    // url for deleting music
    Route::delete('music/{music}', [MusicController::class, 'destroy']);



    // programming url
    // url for visiting adding of programming page
    Route::get('programming', [ProgrammingController::class, 'index']);

    // url for creating new programming
    Route::post('programming', [ProgrammingController::class, 'store']);

    // url for visiting editing of programming page
    Route::get('programming/{programming}/edit', [ProgrammingController::class, 'edit']);

    // url for updating programming 
    Route::put('programming/{programming}', [ProgrammingController::class, 'update']);

    // url for visiting programming details
    Route::get('programming/{programming}', [ProgrammingController::class, 'show']);

    // url for deleting programming
    Route::delete('programming/{programming}', [ProgrammingController::class, 'destroy']);


    // url for school
    // url for visiting adding of school page
    Route::get('school', [SchoolController::class, 'index']);

    // url for creating new school
    Route::post('school', [SchoolController::class, 'store']);

    // url for visiting editing of school page
    Route::get('school/{school}/edit', [SchoolController::class, 'edit']);

    // url for updating school
    Route::put('school/{school}', [SchoolController::class, 'update']);

    // url for visiting school details
    Route::get('school/{school}', [SchoolController::class, 'show']);

    // url for deleting school
    Route::delete('school/{school}', [SchoolController::class, 'destroy']);


    // url for teacher
    // url for visiting adding of teacher page
     Route::get('teacher', [TeacherController::class, 'index']);

     // url for creating new teacher
    Route::post('teacher', [TeacherController::class, 'store']);

    // url for visiting editing of teacher page
    Route::get('teacher/{teacher}/edit', [TeacherController::class, 'edit']);

    // url for updating teacher
    Route::put('teacher/{teacher}', [TeacherController::class, 'update']);

    // url for visiting teacher details
    Route::get('teacher/{teacher}', [TeacherController::class, 'show']);

     // url for deleting teacher
    Route::delete('teacher/{teacher}', [TeacherController::class, 'destroy']);



    // url for student
    // url for visiting adding of student page
    Route::get('student', [StudentController::class, 'index']);

    // url for creating new student
    Route::post('student', [StudentController::class, 'store']);

    // url for visiting editing of student page
    Route::get('student/{student}/edit', [StudentController::class, 'edit']);

    // url for updating student 
    Route::put('student/{student}', [StudentController::class, 'update']);

     // url for visiting student details
    Route::get('student/{student}', [StudentController::class, 'show']);

    // url for deleting student
    Route::delete('student/{student}', [StudentController::class, 'destroy']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
