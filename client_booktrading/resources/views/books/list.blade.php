@extends('layouts.layout')

@section('content')
    <div class="container" style="width: 80%">

        <p>
            These are the books that you've published:
        </p>

        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
            <tr>
                <td>No #</td>
                <td>Image</td>
                <td>Title</td>
                <td>Genre</td>
                <td>Published at</td>
                <td>Price</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
            @foreach($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img style="height: 120px"
                             src="{{ $book['image_url'] }}" alt="Image URL">
                    </td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['genre']['name'] }}</td>
                    <td>{{ $book['created_at'] }}</td>
                    <td>{{ $book['price'] }} kr.</td>
                    <td>
                        <a href="/books/update/{{ $book['id'] }}" class="card-link btn btn-warning mb-2">Edit</a>

                        <form action="/books/{{ $book['id'] }}" method="post">
                            @csrf
                            @method('DELETE')

                            <input class="card-link btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p>
            <a href="/books">Go back to homepage</a>
        </p>
    </div>

@endsection
