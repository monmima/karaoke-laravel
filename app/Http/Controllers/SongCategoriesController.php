<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Song;
use App\Models\SongCategories;
use Illuminate\Http\Request;

class SongCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();

        return [
            "categories" => $categories
        ];
    }

    // show only one category of songs on the main page with click on filters
    public function show($id)
    {

        error_log($id);
        error_log(gettype($id));

        // works only for non-dynamic queries
        // $songs = Song::query()->whereHas('categories', function ($id) {
        //     $id->where("categories.title", $id);
        // })->get();

        // works with dynamic queries
        $songs = Song::query()->whereHas('categories', function ($query) use ($id) {
            $query->where("categories.title", $id);
        })->get();

        $categories = Category::all();


        return view("index", [
            "songs" => $songs,
            "categories" => $categories
        ]);

    }
}
