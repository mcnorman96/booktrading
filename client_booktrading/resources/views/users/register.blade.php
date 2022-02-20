@extends('layouts.layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif
<div class="container" style="width: 60%">
    <h2 class="mb-3">Register</h2>

    <div class="card">
        <div class="card-body">
            <form action="/users/register" method="post">
                @csrf

                <div class="form-group">
                    <label for="email">Name:</label>
                    <input class="form-control" type="text" name="name" id="name" required placeholder="Insert name">
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input class="form-control" type="tel" name="phone" id="phone" required placeholder="Insert phone">
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input class="form-control" type="text" name="city" id="city" required placeholder="Insert city">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" required placeholder="Insert email">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password" required  placeholder="Insert password">
                </div>

                <a href="/" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Register" class="btn btn-primary">
            </form>
        </div>
    </div>



</div>
@endsection
