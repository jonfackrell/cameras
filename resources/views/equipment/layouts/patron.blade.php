<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Social Media Metatags -->
    <meta property="og:site_name" content="Library Mac Lab">
    <meta property="og:title" content="Library Mac Lab">
    <meta property="og:description" content="The purpose of David O. McKay Library Mac Lab is to provide students with a creative space to help them in their academic pursuits by providing access to software, hardware, and trained lab assistants. The Mac Lab provides access to several programs, both commercial and free, that facilitate the creation of digital media, 3D models, and software applications.">
    <meta property="og:image" content="{{ asset('/img/what-we-do-info.png') }}">
    <meta property="og:url" content="http://maclab.byui.edu/">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicons for different devices -->
    <link rel="apple-touch-icon" sizes="57x57" href="https://library.byui.edu/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://library.byui.edu/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://library.byui.edu/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://library.byui.edu/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://library.byui.edu/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://library.byui.edu/img/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://library.byui.edu/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://library.byui.edu/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://library.byui.edu/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://library.byui.edu/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#A5216F">
    <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#A5216F">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#A5216F">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#A5216F">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://library.byui.edu/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://library.byui.edu/css/MegaNavbarBS4.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Custom Website Style -->
    <link rel="stylesheet" href="https://library.byui.edu/assets/css/main.css?id=7723330db7716c52a0d2">
    <link rel='stylesheet' href='{{ asset("/css/macLab.css") }}'>

    <style>
        a.btn.btn-light { background-color: inherit; border: inherit; }
        #ml-header { background-color: #ebebeb; }
        img.nav-icon { position: relative; z-index: 10; }
        div.clip-wrap div.clip-each.border-style-thin { background-color: #00A6DC !important; }
        .clip-each.border-style-thin:hover { background-color: #00A6DC; }
        img#chat-image { width: initial; }
        .green { color: #a9d04c; }
        /*div#button-container { background-color: transparent; }*/
        /*.infographic { border: #525252 solid; }*/
    </style>

    @stack('styles')

    <!-- Jquery -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>


    @stack('header-scripts')

</head>
<body>

@include('layouts.parts.library-top-nav')


<div class="clearfix">&nbsp;</div>

<div class="container breadcrumbs">
    <div class="row">
        <div class="col-md-6">
            <a href="/">HOME</a> / @yield('breadcrumbs')
        </div>
        <div class="col-md-6">
            <form id="website-search-form">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" name="q" id="search-input" class="form-control" aria-label="" placeholder="Search the website...">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-default btn-block">SEARCH</button>
                    </div>
                </div>
            </form>            </div>
    </div>
</div>
<div class="clearfix">&nbsp;</div>

@yield('nav')

<div class="container">

    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>


</div>

@yield('banner')


<div class="clearfix">&nbsp;</div>

@include('layouts.parts.library-footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://maclab.byui.edu/js/jquery-3.2.1.slim.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://library.byui.edu/js/popper.min.js"></script>
<script src="https://library.byui.edu/js/bootstrap.min.js"></script>
<script src="https://library.byui.edu/js/MegaNavbarBS4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
<script src="https://library.byui.edu/assets/js/main.js?id=f94ea33589de7f7fa83e"></script>


<!-- Google Analytics Tracking Code -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-886315-1', 'auto');
    ga('send', 'pageview');
</script>

<script type="application/ld+json">
    {
      "@context" : "http://schema.org",
      "@type" : "Organization",
      "name" : "David O. McKay Library",
      "url" : "http://library.byui.edu/",
      "sameAs" : [
        "https://www.facebook.com/mckaylibrary",
        "https://www.twitter.com/mckaylibrary",
        "http://www.youtube.com/user/mckLibrary"
      ]
    }
</script>

@stack('footer-scripts')

</body>
</html>