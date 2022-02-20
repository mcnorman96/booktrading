<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Trading</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<style>
    * {
        font-family: 'Nunito';
    }
</style>

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href="/books" class="navbar-brand">Book Trading</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/books/create">Publish book</a>
                    </li>

                    @php

                    if(!isset($_SESSION)) 
                    {
                        session_start();
                    }

                    $username = null;
                    $is_logged = false;

                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        $is_logged = true;
                        $username = $_SESSION['name'];
                    }
                    @endphp

                    @if ($is_logged == true)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hi, {{$username}}!<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="/books/list">Repository</a>

                                <a class="dropdown-item" href='/users/logout'>
                                    Logout
                                </a>
                            </div>
                        </li>
                    @endif

                    @if ($is_logged == false)
                        <li class="nav-item"><a class="nav-link" href="/users/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/users/register">Register</a></li>
                    @endif
                </ul>
            </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="jumbotron mt-4">
                <h1 class="display-4">Book Trading</h1>
                <p class="lead">Welcome to the book trading platform! People around the world can trade books.</p>
            </div>

            <div>
                @yield('content')
            </div>

            <footer class="mt-5 mb-3" style="text-align: center">
                &copy; Copyright. Book Trading 2020.
            </footer>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
