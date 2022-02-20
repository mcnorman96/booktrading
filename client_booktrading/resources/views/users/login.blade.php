@extends('layouts.layout')

@section('content')

@if (session('message'))
    <div class="alert alert-primary" role="alert">
        {{ session('message') }}
    </div>
@endif

<div class="container" style="width: 60%">
    <h2 class="mb-3">Login</h2>

    <div class="card">
        <div class="card-body">
            <form action="/users/loginNow" method="post">
                @csrf

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Insert email" >
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Insert password" >
                </div>

                <a href="/" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Login" class="btn btn-primary">
            </form>

        </div>
    </div>
</div>

@endsection
