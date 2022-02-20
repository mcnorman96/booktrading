<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index() {
        $genres = Genre::all();

        return response()->json($genres, 200);
    }
}
