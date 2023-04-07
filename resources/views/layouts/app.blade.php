<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

 {{-- link to the local css file --}}
 {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

 <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


 

<!-- Bootstrap CSS -->
{{-- <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}"> --}}
   


<!-- Include Bootstrap CSS from the CDN -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"> --}}

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">HMOs Fee for Service Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('claims.index') }}">Claims</a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

   
</body><!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>



<footer>
    <div class="theme-switch-wrapper">
      <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
      </label>
      <em>Enable Dark Mode!</em>
    </div>
  </footer>

</html>
