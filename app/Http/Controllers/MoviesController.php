<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index')->with(compact('movies'));
        // return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title'=> 'required',
          'rating'=> 'required | numeric | max:10',
          'release_date'=> 'required',
          'awards'=> 'required | integer',
          'poster'=> 'required | mimes:jpeg,jpg,png,gif,svg',
        ],[
          'title.required'=>'Ingrese un titulo',
          'rating.required'=> 'ingrese un rating',
          'rating.numeric'=> 'ingrese un número',
          'release_date.required'=> 'ingrese un release date',
          'awards.required'=> 'ingrese cant de premios',
          'poster.required'=> 'ingrese una imagen',
          'poster.mimes'=> 'imagen jpg, png, svg o gif',
        ]);

        $movie = new Movie;

        $movie->title = $request->title;
        $movie->rating = $request->rating;
        $movie->awards = $request->awards;
        $movie->release_date = $request->release_date;

        $file = $request->file('poster');

        $nombreFinal = strtolower(str_replace(" ", "_", $request->title));

        $name = $nombreFinal . uniqid('_image_') . "." . $file->extension();

        $file->storePubliclyAs("public/posters", $name);

        $movie->poster = $name;

        $movie->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);

        return view('movies.show')->with(compact('movie'));
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
    }
}
