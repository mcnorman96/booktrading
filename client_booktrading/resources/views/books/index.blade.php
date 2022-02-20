@extends('layouts.layout')

@section('content')

<div class="container">

<div class="d-flex justify-content-center">
    <form action="/books" method="get" class="form-inline">
        <input  class="form-control mr-sm-2"
            type="search" name="title" id="title" placeholder="Search by title"
            value="{{ $selectedTitle }}"
        >

        @if($selectedTitle != '')
            <a href="/books" class="btn btn-link">Reset</a>
        @endif

        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search">
    </form><br>
</div>
    @if ($books)
        <h5>
            Available books for trading:
            <strong>{{ count($books) }} books</strong>
        </h5>
    @endif

    <form action="/books" method="get" class="form-inline search">
        <select name="genre" id="genre" class="form-control mr-sm-2">
            <option selected disabled>Select genre</option>
            @if ($genres)
                @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}" 
                    {{ $selectedGenre == $genre['id'] ? 'selected' : ''}}>
                    {{ $genre['name'] }}
                </option>
                @endforeach
            @endif
        </select>

        @if($selectedGenre != '')
            <a href="/books" class="btn btn-link">Reset</a>
        @endif

        <input type="submit" value="Filter" class="btn btn-outline-success my-2 my-sm-0">
    </form>

    <div class="card-columns mt-3">
        @if ($books)
        @foreach($books as $book)
        <div class="card" style="width: 18rem">
            <img src="{{ $book['image_url'] }}" class="card-img-top" alt="Book Image">
            <div class="card-body">
                <h5 class="card-title">{{ $book['title'] }}</h5>
                <p class="card-text">{{ $book['genre']['name'] }}</p>
                <p class="card-text description">{{ $book['description'] }}</p>
                <p class="card-text"><small class="text-muted">City: {{ $book['user']['city'] }} </small></p>
                <p class="card-text"><small class="text-muted">Published at: {{ date('d-m-Y', strtotime($book['created_at'])) }}</small></p>
                <a href="/books/{{$book['id']}}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    @endforeach
        @endif
        
    </div>
</div>

@endsection

