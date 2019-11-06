<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laracasts clone</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/assets/css/core.min.css" rel="stylesheet">
    <link href="/assets/css/thesaas.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


</head>
<body>
    <div id="app">

      <!-- Topbar -->
      <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
        <div class="container">

          <div class="topbar-left">
            <button class="topbar-toggler">&#9776;</button>
            <a class="topbar-brand" href="index.html">
              <img class="logo-default" src="/assets/img/logo.png" alt="logo">
              <img class="logo-inverse" src="/assets/img/logo-light.png" alt="logo">
            </a>
          </div>


          <div class="topbar-right">
            <ul class="topbar-nav nav">
              <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
              @if(auth()->check())
              <li class="nav-item">Welcome {{auth()->user()->name}}</li>
              @else
              <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>

              @endif
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Samples <i class="fa fa-caret-down"></i></a>
                <div class="nav-submenu">
                  <a class="nav-link" href="demo-helpato.html">Helpato</a>
                  <a class="nav-link" href="demo-trello.html">Trello</a>
                  <a class="nav-link" href="demo-gmail.html">Gmail</a>
                  <a class="nav-link" href="demo-skype.html">Skype</a>
                  <a class="nav-link" href="demo-github.html">GitHub</a>
                  <a class="nav-link" href="demo-app.html">Mobile App</a>
                  <a class="nav-link" href="demo-bootstrap.html">Bootstrap</a>
                  <a class="nav-link" href="demo-slack.html">Slack</a>
                  <a class="nav-link" href="demo-zendesk.html">Zendesk</a>
                </div>
              </li> -->




            </ul>
          </div>

        </div>
      </nav>

<!-- End top bar -->

<!-- HEader -->
      @yield('header')
<!-- end header -->
        <main class="main-content">
            @yield('content')
        </main>



    </div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="/assets/js/core.min.js"></script>
<script src="/assets/js/thesaas.min.js"></script>
<script src="/assets/js/script.js"></script>
</html>
