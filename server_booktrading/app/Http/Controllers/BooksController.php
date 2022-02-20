<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\User;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {
        $title = \request('title');
        $genreId = \request('genre');

        $books = [];

        if ($title != '') {
            $books = Book::where('title', 'LIKE', '%' . $title . '%')
                ->with('genre')
                ->with('user')
                ->get();
        } else {
            $books = $genreId != ''
                ? Book::where('genre_id', $genreId)
                    ->with('genre')
                    ->with('user')
                    ->get()
                : Book::with('genre')
                    ->with('user')
                    ->get();
        }

        return response()->json($books, 200);
    }

    public function show($id) {
        $book = Book::findOrFail($id);

        $genre = Genre::findOrFail($book->genre_id);
        $user = User::findOrFail($book->user_id);

        $book->genre = $genre->name;
        $book->user = $user;

        return response()->json($book, 200);
    }

    public function store() {
        $title = \request('title');
        $price = \request('price');
        $description = \request('description');
        $imageUrl = \request('imageUrl');
        $genreId = \request('genreId');
        $userId = \request('user_id');

        $book = new Book();

        $book->title = $title;
        $book->description = $description;
        $book->image_url = $imageUrl;
        $book->price = $price;
        $book->genre_id = $genreId;
        $book->user_id = $userId;

        $book->save();

        return response()->json($book, 200);
    }

    public function update() {
        $id = \request('id');

        $book = Book::findOrFail($id);

        $title = \request('title');
        $price = \request('price');
        $description = \request('description');
        $imageUrl = \request('imageUrl');
        $genreId = \request('genreId');
        $userId = \request('user_id');

        if ($book->user_id != $userId) {
            return abort(403, 'Unauthorized action.');
        }

        $book->title = $title;
        $book->description = $description;
        $book->image_url = $imageUrl;
        $book->price = $price;
        $book->genre_id = $genreId;
        $book->user_id = $userId;

        $book->save();

        return response()->json($book, 200);
    }

    public function destroy($id) {
        $userId = \request('user_id');

        $book = Book::findOrFail($id);

        if ($book->user_id != $userId) {
            return abort(403, 'Unauthorized action.');
        }

        $book->delete();

        return response()->json(true, 200);
    }

    public function list() {
        $userId = \request('user_id');

        $books = Book::where('user_id', $userId)
            ->with('genre')
            ->get();

        return response()->json($books, 200);
    }
}
