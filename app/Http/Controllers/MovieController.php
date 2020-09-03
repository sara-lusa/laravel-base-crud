<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movies = Movie::all();

      return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate($this->getValidation());
      $data_request = $request->all();

      $new_movie = new Movie();
      // $new_movie->title = $data_request['title'];
      // $new_movie->year = $data_request['year'];
      // $new_movie->description = $data_request['description'];
      // $new_movie->rating = $data_request['rating'];
      $new_movie->fill($data_request);
      $saved = $new_movie->save();

      if($saved) {
        $movie_saved = Movie::orderBy('id', 'desc')->first();
        return redirect()->route('movies.show', $movie_saved);
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate($this->getValidation());
        $data_request = $request->all();

        $movie->update($data_request);

        return redirect()->route('movies.show', $movie->id);
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

    protected function getValidation()
    {
      return [
        'title' => 'required|max:255',
        'year' => 'required|integer|min:1895|max:2020',
        'description' => 'required',
        'rating' => 'required|integer|max: 10|min: 0'
      ];
    }
}
