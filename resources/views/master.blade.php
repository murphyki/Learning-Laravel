<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- build:css(.) /css/app.css -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- endbuild -->

    <!-- build:js(.) /js/scripts_header.js -->
    <script src="/js/scripts_header.js"></script>
    <!-- endbuild -->
    @yield('additional_scripts')

</head>
<body>
<!--[if lt IE 10]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                            <li><a href="#">{{ Auth::user()->email }}</a></li>
                            <li class="nav-divider"></li>
                            <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
                        @else
                            <li><a href="{{ route('auth.login') }}">Log In</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<!-- build:js(.) /js/scripts_footer.js -->
<script src="/js/scripts_footer.js"></script>
<!-- endbuild -->
@yield('additional_scripts')
</body>
</html>