@extends('layouts.layout')

@section('content')

    @if(session('message') != null)

        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>

    @endif

    <div class="container d-flex justify-content-center">

        <div class="card" style="width: 60%">
            <img src="{{ $book['image_url'] }}" class="card-img-top" alt="Book Image">
            <div class="card-body">
                <h5 class="card-title">{{ $book['title'] }}</h5>
                <p class="card-text">{{ $book['description'] }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Published at: <strong>{{ date('d-m-Y', strtotime($book['created_at'])) }}</strong></li>
                <li class="list-group-item">Price: <strong>{{ $book['price'] }} kr.</strong></li>
                <li class="list-group-item">Genre: <strong>{{ $book['genre'] }}</strong></li>
                <li class="list-group-item">Owner name: <strong> {{ $book['user']['name'] }}</strong></li>
                <li class="list-group-item">Owner phone: <strong>{{ $book['user']['phone'] }}</strong></li>
                <li class="list-group-item">City: <strong>{{ $book['user']['city'] }}</strong></li>
            </ul>
        </div>
    </div>

    <p>
        <a href="/books">Go back to books</a>
    </p>

@endsection
