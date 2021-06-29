<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Validation\Rule;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();

        return view("index", [
            "songs" => $songs
        ]);
    }

    // show the edit form
    public function edit($id)
    {
        $song = Song::findOrFail($id);

        return view("/edit", [
            "song" => $song
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $song = Song::findOrFail($id);
        // $categories = SongCategorie::all();

        // $validated = $request->validate([
        //     // this rule makes it possible to change the name of an item as long as the it remains unique
        //     // this rule also makes it possible to change anything other data while keeping the same unique name for the item
        //     "name" => ["required", "min:5", "max:255", Rule::unique("name")->ignore($song->id)],

        //     "artist" => "required",
        //     "lyrics" => "",

        //     // "categorie" => "required"
        // ]);

        // updating song table
        $song->name = request("name");
        $song->artist = request("artist");
        $song->lyrics = request("lyrics");

        // $song->categorie = request("categorie");
        $song->save();

        // back to the main page
        $song = Song::all();

        return redirect("/");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            "name" => "required|min:5|max:255|unique:songs",
            "artist" => "required",
            "lyrics" => "required",
            // "categorie" => "required"
        ]);

        //

        $song = new Song();

        // 1. the basic way
        $song->name = request("name");
        $song->artist = request("artist");
        $song->lyrics = request("lyrics");
        $song->save();

        // --processing categories-- //



        // --end processing categories-- //

        return redirect("/")->with("msg", "Song was added");
    }
}
