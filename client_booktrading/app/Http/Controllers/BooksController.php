<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

const apiUrl = 'http://127.0.0.1:8080/api/';

class BooksController extends Controller
{
    public function index() {
        $title = \request('title');
        $genreId = \request('genre');
    
        $getUrl = apiUrl . 'books/';
    
        $response = Http::get($getUrl);
        $books = $response->json();
        //var_dump($books);
        
        if ($title != '') {
            $getUrl = $getUrl . '?title=' . $title;
        } else {
            if ($genreId != '') {
                $getUrl = $getUrl . '?genre=' . $genreId;
            }
        }
    

    
        $response2 = Http::get(apiUrl . 'genres');
        $genres = $response2->json();
    
        return view('books/index', [
            'books' => $books,
            'genres' => $genres,
            'selectedGenre' => $genreId,
            'selectedTitle' => $title
        ]);
    }

    public function create() {
        session_start();
        if(isset($_SESSION['logged_in']) == false) {
            return redirect('/users/login');
        }

        $genres = $this->getGenres();
    
        return view('/books/create', [
            'genres' => $genres
        ]);
    }

    public function update($id) {
        session_start();
        if(isset($_SESSION['logged_in']) == false) {
            return redirect('/users/login');
        }

        $response = Http::get(apiUrl . 'books/' . $id);
        $book = $response->json();
        
        $genres = $this->getGenres();
    
        return view('/books/update', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function show($id) {
        $response = Http::get(apiUrl . 'books/' . $id);
        $book = $response->json();
    
        return view('/books/show', [
            'book' => $book
        ]);
    }

    public function store() {
        session_start();
        if(isset($_SESSION['logged_in']) == false) {
            return redirect('/users/login');
        }

        $title = \request('title');
        $price = \request('price');
        $description = \request('description');
        $imageUrl = \request('image_url');
        $genreId = \request('genre_id');

        $user_id = $_SESSION['user_id'];

        Http::post(apiUrl . 'books', [
            'title' => $title,
            'price' => $price,
            'description' => $description,
            'imageUrl' => $imageUrl,
            'genreId' => $genreId,
            'user_id' => $user_id
        ]);
    
        return redirect('/books/list');
    }

    public function edit() {
        session_start();
        if(isset($_SESSION['logged_in']) == false) {
            return redirect('/users/login');
        }

        $id = \request('id');
        $created_at = \request('created_at');
        $title = \request('title');
        $price = \request('price');
        $description = \request('description');
        $imageUrl = \request('image_url');
        $genreId = \request('genre_id');
        
        $user_id = $_SESSION['user_id'];
    
        Http::put(apiUrl . 'books', [
            'id' => $id,
            'created_at' => $created_at,
            'title' => $title,
            'price' => $price,
            'description' => $description,
            'imageUrl' => $imageUrl,
            'genreId' => $genreId,
            'user_id' => $user_id
        ]);
    
        return redirect('/books/list');
    }

    public function destroy($id) {
        session_start();
        if(isset($_SESSION['logged_in']) == false) {
            return redirect('/users/login');
        }

        $user_id = $_SESSION['user_id'];

        Http::delete(apiUrl . 'books/' . $id, [
            'user_id' => $user_id
        ]);
    
        return redirect('/books/list');
    }

    public function list() {
        session_start();
        if(isset($_SESSION['logged_in']) == false) {
            return redirect('/users/login');
        }

        $user_id = $_SESSION['user_id'];

        $response = Http::post(apiUrl . 'books/list', [
            'user_id' => $user_id
        ]);

        $books = $response->json();

        return view('/books/list', ['books' => $books]);
    }

    private function getGenres() {
        $response = Http::get(apiUrl . 'genres');
        $allGenres = $response->json();
    
        $genres = array_filter($allGenres, function($genre) {
            return $genre['parent_id'] != 0;
        });
    
        return $genres;
    }
}
