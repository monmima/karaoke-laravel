<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Category;
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
        $categories = Category::all();

        return view("index", [
            "songs" => $songs,
            "categories" => $categories
        ]);
    }

    // test2 page
    public function indexJSON2()
    {
        $songs = Song::all();
        $categories = Category::all();

        return [
            "songs" => $songs,
            "categories" => $categories
        ];
    }

    // test page
    public function indexJSON()
    {
        $songs = Song::all();
        $categories = Category::all();

        // foreach ($songs as $item) {
        //     // dd($songs->item);
        //     $songs->attach(1);
        // }

        $song = Song::findOrFail(1);
        $song->categories()->attach(1);

        return [
            // "songs" => $song,
            "song" => $song->load('categories')
        ];
    }

    // show the edit form
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $categories = Category::all();

        return view("/edit", [
            "song" => $song,
            "categories" => $categories
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
        $categories = Category::all();

        // updating song table
        $song->name = request("name");
        $song->artist = request("artist");
        $song->lyrics = request("lyrics");
        $song->save();

        // --processing categories-- //

            // 1. creating an array of ticked boxes
            $input = $request->all();
            error_log(print_r($input, true));

            // 2. removing useless stuff from the array before working with it any further
            unset($input["_token"]);
            unset($input["_method"]);
            unset($input["artist"]);
            unset($input["lyrics"]);

            // 3. wiping the slate clean for the categories
            $song->categories()->detach($categories);

            // 4. attaching categories that are ticked
            // the purpose of array_keys is to return the names of the keys, not their values
            $song->categories()->attach(array_keys($input));

            // 5. returning the keys and their values to the console
            // error_log(print_r(array_keys($input), true));
            error_log(print_r($input, true));

        // --end processing categories-- //

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
            "name" => "required|min:3|max:255|unique:songs",
            "artist" => "required",
            // "categorie" => "required"
        ]);

        //

        $song = new Song();
        $categories = Category::all();

        // 1. the basic way
        $song->name = request("name");
        $song->artist = request("artist");
        $song->lyrics = request("lyrics");
        $song->save();

        // --processing categories-- //

            // 1. creating an array of ticked boxes
            $input = $request->all();

            // 2. removing useless stuff from the array before working with it any further
            unset($input["_token"]);
            unset($input["_method"]);
            unset($input["name"]);

            // 3. wiping the slate clean for the categories - this step is useless here since the entry is being created
            // $song->categories()->detach($categories);

            // 4. attaching categories that are ticked
            // the purpose of array_keys is to return the names of the keys, not their values
            // $song->categories()->attach(array_keys($input));
            $song->categories()->attach(array_keys($input));

            // 5. returning the keys and their values to the console
            // error_log(print_r(array_keys($input), true));
            // error_log(print_r(array_keys($input), true));
            // error_log(print_r($input, true));

        // --end processing categories-- //

        return redirect("/")->with("msg", "Song was added");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produit = Song::findOrFail($id);
        $produit->delete();

        return redirect("/");
    }
}
