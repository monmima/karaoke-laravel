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
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $song = Song::findOrFail($id);
        // $categories = ProduitCategorie::all();

        // $validated = $request->validate([
        //     // this rule makes it possible to change the name of an item as long as the it remains unique
        //     // this rule also makes it possible to change anything other data while keeping the same unique name for the item
        //     "name" => ["required", "min:5", "max:255", Rule::unique("name")->ignore($song->id)],

        //     "artist" => "required",
        //     "lyrics" => "",
        //     "link" => "required"

        //     // "categorie" => "required"
        // ]);

        // updating produit table
        $song->name = request("name");
        $song->artist = request("artist");
        $song->lyrics = request("lyrics");
        $song->link = request("link");

        // $produit->categorie = request("categorie");
        $song->save();

        // back to the main page
        $song = Song::all();

        return redirect("/");
    }
}
