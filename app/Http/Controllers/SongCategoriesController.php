<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
