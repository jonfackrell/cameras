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
    <meta property="og:description" content="The David O. McKay Library serves university and community patrons with a vast book collection, hundreds of databases, and much more. The building also houses university archives, a special exhibition area, and instructional technology labs.">
    <meta property="og:image" content="http://library.byui.edu/img/mckay-library-outside-west-wing.png">
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
    <link rel='stylesheet' href='/css/macLab.css'>

    <style>
        a.btn.btn-light { background-color: inherit; border: inherit; }
        #ml-header { background-color: #00A6DC; }
        img.nav-icon { position: relative; z-index: 10; }
        .clip-each.border-style-thin:hover { background-color: #00A6DC; }
        img#chat-image { width: initial; }
        /*.infographic { border: #525252 solid; }*/
    </style>

    @stack('styles')

    <!-- Jquery -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

    <!-- Handlebars.js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js'></script>
    <!-- Moment.js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js'></script>
    <!-- handlebars temple for workshops -->
    <script id="event-template" type="text/x-handlebars-template">
        <div class="col event-card" onClick="javascript: window.location = '@{{url.public}}';">
            <div class="card-header">
                @{{ date }}
            </div>
            <div class="card-body">
                <div class="event-title">
                    @{{ title }}
                </div>
                <div class="event-description">
                    @{{{ description }}}
                </div>
                <i>@{{{start_time}}} - @{{{end_time}}}@{{#if location.name}} <br/>@{{ location.name }}@{{/if}}</i>
            </div>
        </div>
    </script>
    <!-- Workshops -->
    <!--<script src='https://content.byui.edu/file/0af2f055-7202-403e-9894-bb80478aa98c/1/workshops.js'></script>-->
    <script src='/js/workshops.js'></script>

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
<div class="container-fluid" id="ml-header">
    <div class="container">
        <a href="/" class="row justify-content-center">
            <span class="col-lg-3 col-md-4 col-5">  
                <img class="col-12 img-fluid" src="/img/ml-logo-lt.png" alt="Mac Lab: MCK 140A">
            </span>
        </a>
    </div>
</div>

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

<div class="container event-cards" id='workshops'>
    <div class="row event-header">
        <div class="col-md-9">
            <h2 class='events-title' style="font-size: 18px; line-height: 2em; padding-left: 12px;">
                UPCOMING WORKSHOPS
            </h2>
        </div>
        <div class="col-md-3" style="text-align: right; padding-top: 9px;">
            <a href="https://byui.libcal.com/calendar/events/?ct=36359" style="padding: 4px 12px 4px 6px; color: #A5216F">SEE ALL EVENTS</a>
        </div>
    </div>
    <div class="row events-body"></div>
</div>


<div class="clearfix">&nbsp;</div>

<div id="footer" class="container-fluid">
    <div id="brand" class="container">
        <div class="row">
            <div class="col-md-4">
                <section>
                    <h2>
                        Contact
                    </h2>
                </section>
                <ul>
                    <li>
                        <a href="tel:208-496-9522">208-496-9522</a> | <a href="https://library.byui.edu/contact">More <span class="sr-only">More Contact Information</span></a>
                    </li>
                    <li>
                        <a href="https://library.byui.edu/maps">
                            Library Maps
                        </a>
                    </li>
                    <li>
                        <a href="https://goo.gl/maps/YEPrFH77La42">525 S Center St, Rexburg, ID 83460</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-3">
                <section>
                    <h2>
                        Popular Links
                    </h2>
                </section>
                <ul>
                    <li>
                        <a href="https://byui.libcal.com/hours/">
                            Hours
                        </a>
                    </li>
                    <li>
                        <a href="https://library.byui.edu/?powertour=1">
                            Library Website Tour
                        </a>
                    </li>
                    <li>
                        <a href="https://library.byui.edu/student-employment">
                            Student Employment
                        </a>
                    </li>
                    <li>
                        <a href="http://byui.ask.libraryh3lp.com/questions/36032">
                            Wireless Printing
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4" style="text-align: right;">
                <div class="">
                    <section style="margin-bottom: 12px;">
                        <h2>
                            Connect with Us
                        </h2>
                    </section>
                    <div class="social-media-icons" style="margin-bottom: 14px;">
                        <a href="https://www.instagram.com/byui.maclab">
                            <i class="fab fa-instagram"></i>
                            <span class="sr-only">Follow the Mac Lab on Instagram</span>
                        </a>


                        <a href="https://www.facebook.com/mckaylibrary">
                            <i class="fab fa-facebook-f"></i>
                            <span class="sr-only">Follow the McKay Library on Facebook</span>
                        </a>
                        <a href="https://www.twitter.com/mckaylibrary">
                            <i class="fab fa-twitter"></i>
                            <span class="sr-only">Follow the McKay Library on Twitter</span>
                        </a>
                        <a href="http://www.youtube.com/user/mckLibrary">
                            <i class="fa fa-play"></i>
                            <span class="sr-only">Learn about the McKay Library on YouTube</span>
                        </a>
                    </div>
                    <a href="http://www.byui.edu/copyright/policy/terms-of-use/">Copyright &copy; 2018</a>
                </div>
            </div>
        </div>
    </div>
</div>

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
<script>

    window.mckay = {
        source: 'all',
        search: function($form){
            var searchTerm = $form.find('input[name="q"]').val();
            searchTerm = encodeURIComponent(searchTerm);
            //mckay.logEvent({path: '/eds-search?q='+searchTerm, name: 'EDS Search'});
            if (searchTerm != "")
            {
                var get_params = '';
                var $prefilters = $form.find('input[name="prefilter"]');
                $prefilters.each(function(i, val){
                    $prefilter = $(this);
                    if($prefilter.is(':checked')){
                        switch($prefilter.val()){
                            case 'print':
                                mckay.source = 'catalog';
                                searchTerm = searchTerm + ' AND (PT Book) NOT (PT eBook) ';
                                break;
                            case 'ebook':
                                searchTerm = searchTerm + ' AND (PT eBook) ';
                                break;
                            case 'chkPeerReviewed':
                                get_params = '&cli0=FT1&clv0=Y&cli1=RV&clv1=Y&type=0&site=eds-live';
                                break;
                        }
                    }
                });
                switch (mckay.source)
                {
                    case "all":
                        var basic_url = "http://search.ebscohost.com/login.aspx?authtype=ip,guest&custid=s8406107&groupid=main&profile=eds&direct=true&scope=site";
                        var search_url = basic_url + "&bquery=" + searchTerm + get_params;
                        mckay.openSearch(search_url);
                        break;

                    case "catalog":
                        var basic_url = "http://search.ebscohost.com/login.aspx?authtype=ip,guest&custid=s8406107&groupid=main&profile=eds&direct=true&defaultdb=cat03146a&scope=site";
                        var search_url = basic_url + "&bquery=" + searchTerm + get_params;
                        mckay.openSearch(search_url);
                        break;

                    case "articles":
                        var basic_url = "http://search.ebscohost.com/login.aspx?authtype=ip,guest&custid=s8406107&groupid=main&profile=eds&direct=true&scope=site";
                        var search_url = basic_url + "&bquery=" + searchTerm + " " + "AND ZT Article" + get_params;
                        mckay.openSearch(search_url);
                        break;

                    case "website":
                        var basic_url = "https://www.google.com/search?safe=active";
                        var search_url = basic_url + "&q=" + searchTerm + " " + "+site%3Alibrary.byui.edu";
                        mckay.openSearch(search_url);
                        break;
                }
            }
            else {
                emptystring = "Please enter a search term." ;
                alert(emptystring);
                $form.find('input[name="q"]').focus();
            }

        },

        openSearch: function (search_link){

            if (search_link != "default")
            {
                if(!mckay.isMobile() && !mckay.inIframe()){
                    popupWin = window.open(search_link, '');
                }else{
                    window.location = search_link;
                }
                return false;
            }

        },

        isMobile: function() {

            var check = false;
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                check = true;
            }
            return check;

        },

        inIframe: function () {

            try {
                return window.self !== window.top;
            } catch (e) {
                return true;
            }

        }
    }
    $( document ).ready(function() {
        $(document).on('click', 'form#main-search-form label', function(e){
            var $select = $(this).find('input');
            switch($select.val()){
                case 'all':
                    mckay.source = 'all';
                    $('input[name="prefilter"]').removeAttr('disabled');
                    break;
                case 'catalog':
                    mckay.source = 'catalog';
                    $('input#all').removeAttr('disabled');
                    $('input#ebook').removeAttr('disabled');
                    $('input#print').removeAttr('disabled');
                    $('input#chkPeerReviewed').attr("disabled", true);
                    if($('input#chkPeerReviewed').is(':checked')){
                        $('#all').prop("checked", true);
                    }
                    break;
                case 'articles':
                    mckay.source = 'articles';
                    $('input#all').removeAttr('disabled');
                    $('input#chkPeerReviewed').removeAttr('disabled');
                    $('input#ebook').attr("disabled", true);
                    $('input#print').attr("disabled", true);
                    if($('input#ebook').is(':checked') || $('input#print').is(':checked')){
                        $('#all').prop("checked", true);
                    }
                    break;
                    break;
                case 'website':
                    mckay.source = 'website';
                    $('input[name="prefilter"]').attr("disabled", true);
                    $('#all').prop("checked", false);
                    break;
            }
        });
        // Perform EDS search when user submits form
        $(document).on('submit', 'form#main-search-form', function(e){
            e.preventDefault();
            mckay.search($(this));
            return false;
        });
        // Perform website search when user submits form
        $(document).on('submit', 'form#website-search-form', function(e){
            e.preventDefault();
            var searchTerm = $(this).find('input[name="q"]').val();
            window.location = 'https://www.google.com/search?safe=active&q=' + searchTerm + ' ' + '+site%3Alibrary.byui.edu';
            return false;
        });
    });
</script>

<script type='text/javascript'>
    window.__lo_site_id = 115865;
    (function() {
        var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
        wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
    })();
</script>

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
<a href="http://byui.idm.oclc.org/login?url=http://library.byui.edu/library-chat" title="Ask a Librarian">
    <span class="sr-only">Ask a Librarian</span>
    <div id="chat-container" class="chat-container" role="button" tabindex="0" style="margin: -75px 0px 0px auto; padding: 0px; border-style: solid; border-width: 0px; font-style: normal; font-weight: normal; font-variant: normal; list-style: none outside none; letter-spacing: normal; line-height: normal; text-decoration: none; vertical-align: baseline; white-space: normal; word-spacing: normal; background-repeat: repeat-x; background-position: left bottom; background-color: #A5216F; border-color: transparent; border-radius: 2px; width: 40px; height: 178px; cursor: pointer; display: block; z-index: 107158; position: fixed; top: 50%; bottom: auto; left: auto; right: 0px;">
        <img src="https://library.byui.edu/images/live-chat.png" id="chat-image" alt="Chat with a Librarian" class="chat-image" style="margin: 0px; padding: 0px; border-style: none; border-width: 0px; font-style: normal; font-weight: normal; font-variant: normal; list-style: none outside none; letter-spacing: normal; line-height: normal; text-decoration: none; vertical-align: baseline; white-space: normal; word-spacing: normal; position: absolute; z-index: 600; left: 3px; top: 7px;">
    </div>
</a>
@stack('footer-scripts')
</body>
</html>