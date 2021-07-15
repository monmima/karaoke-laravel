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
        $songs = Song::all();

        $categories = Category::all();

        // return view("index", [
        //     "songs" => $songs
        //         ->where("title", $id),
        //     "categories" => $categories
        // ]);

        // error_log($songs->categories);

        /* print song only when song has a matching category with the id */
        foreach ($songs as $item) {
            // foreach($item->categories as $categorie) {
            //     error_log($categorie["title"]);
            // }

            // if (in_array($id, $item->categories))
            //     error_log("test");

            // 1. create an array
            $sortedSongs = array();
            $result = array();

            // 2. iterate through the array
            foreach($item->categories as $categorie) {
                // 2.1 push categories for each song to array
                array_push($sortedSongs, $categorie["title"]);
                // error_log($categorie["title"]);

                // 2.2 if song category in array, push song to $result
                if (in_array($id, $sortedSongs)) {
                    // error_log("test");
                    array_push($result, $categorie["title"]);
                }

                error_log($item);
                error_log(print_r($result, true));
            }

            // 3.


                        // foreach($item->categories as $categorie) {
            //     error_log($categorie["title"]);
            // }


            // error_log(print_r($allCategNames, true));
            // error_log(print_r($allCategNames, true));
            // error_log(print_r($allCategNames, true));
            // error_log(print_r($allCategNames, true));
            // error_log("test");
        }

        return [
            "songs" => $result
        ];
    }
}
