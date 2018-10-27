<?php

namespace App\Http\Controllers;

use App\Country;
use App\Film;
use App\Genre;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::latest('release_date')->with('photo')
            ->paginate(1);

//        dd($films);

        return view('films', [
            'films'   => $films,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('title')->get();
        $genres = Genre::orderBy('name')->get();

        return view('film-create', [
            'film'      => new Film(),
            'countries' => $countries,
            'genres'    => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|string',
            'description'   => 'required|string',
            'release_date' => 'required|string|date',
            'country'       => 'required|integer|exists:countries,id',
            'genre'         => 'required|integer|exists:genres,id',
            'rating'        => 'required|integer|between:1,5',
            'ticket_price'  => 'required|numeric|min:0|max:99.99',
            'photo'         => "required|image|mimes:jpg,jpeg,png|max:2048",
        ]);

        $film = new Film();
        $film->name = $request->input('name');
        $film->slug = $this->generateSlug($film->name);
        $film->description = $request->input('description');
        $film->release_date = $request->input('release_date');
        $film->country_id = $request->input('country');
        $film->genre_id = $request->input('genre');
        $film->rating = $request->input('rating');
        $film->ticket_price = $request->input('ticket_price');
        $film->save();

        $this->uploadImage($film, 'photo');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }
    public function show($slug) {
        $film = Film::where('slug', '=', $slug)->firstOrFail();
        return view('film', [
            'film'     => $film,
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
