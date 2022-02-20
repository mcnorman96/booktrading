@extends('layouts.layout')

@section('content')

<div class="container" style="width: 80%">
    <h2>Publish your book</h2>

    <form action="/books" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" required placeholder="Insert title">
        </div>

        <div class="form-group">
            <label for="image_url">Image URL</label>
            <input class="form-control" type="text" name="image_url" id="image_url" required placeholder="Insert image URL">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price" id="price" required placeholder="Insert price">
        </div>

        <div class="form-group">
            <label for="genre_id">Genre</label>
            <select class="form-control" name="genre_id" id="genre_id">
                <option disabled selected>Choose genre</option>

                @foreach($genres as $genre)
                    <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Insert description"></textarea>
        </div>

        <a href="/books" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Publish book" class="btn btn-primary">
    </form>
</div>


@endsection
