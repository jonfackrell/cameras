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
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <!-- Custom Website Style -->
    <link rel="stylesheet" href="https://library.byui.edu/assets/css/main.css?id=7723330db7716c52a0d2">
    <style>

    </style>

</head>
<body>
<!--
<div style="background-color: #FBE68C;">
<p style="text-align: center; padding: 10px; margin: 0px; color: #AD0C20;">
    If you experience problems logging into the library databases, call 208-496-1411 or email <a href="mailto:byuisupportcenter@byui.edu">byuisupportcenter@byui.edu</a> and let them know CAS is unavailable.
</p>
</div>
-->
<div id="top-nav-bar" class="container-fluid sticky-top">

    <nav class="navbar navbar-expand-lg navbar-dark" id="main_navbar" role="navigation">
        <div class="container">
            <span class="navbar-brand-container">
                <a class="navbar-brand" href="http://www.byui.edu">
                    <img src="https://library.byui.edu/img/byui-logo-white.png" class="d-inline-block align-top" style="height: 60px; width: 72px;" alt="BYU-Idaho Home">
                </a>
                <a class="navbar-brand" href="https://library.byui.edu/" style="">
                    <img src="https://library.byui.edu/img/mckay-library-logo-white.png" class="d-inline-block align-top" style="height: 60px; width: 245px;" alt="David O. McKay Library Home">
                </a>
            </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-brand_size_lg" aria-controls="navbar-brand_size_lg" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-brand_size_lg">
                <!--left side-->
                <ul class="nav navbar-nav navbar-right">

                    <li class="nav-item dropdown">
                        <a data-toggle="collapse" href="#research-tools" class="dropdown-toggle collapsed" id="research-tools-menu"> Research Tools</a>
                        <div class="dropdown-menu col-md-6 virtual-library-tour-research-tools" id="research-tools">
                            <div class="p-3">
                                <div class="container">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <h2>Search</h2>
                                            <ul>
                                                <li>
                                                    <a href="http://hip.byui.edu/">
                                                        Catalog
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://libguides.byui.edu/az.php">
                                                        Databases
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://sfx.lib.byu.edu/byuidaho/az/">
                                                        Journals by Title
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://www.worldcat.org/">
                                                        WorldCat
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h2>Help</h2>
                                            <ul>
                                                <li>
                                                    <a href="https://library.byui.edu/begin-your-research">
                                                        Begin Your Research
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://libguides.byui.edu/citations">
                                                        Citing Sources
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://libguides.byui.edu/">
                                                        Research Guides
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://byui.libcal.com/appointments/">
                                                        Meet with a Librarian
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row mb-2">
                                        <div class="col">
                                            <a href="http://refworks.proquest.com/">
                                                <img src="https://library.byui.edu/img/refworks.jpg" alt="RefWorks Login" style="width: 100%; height: auto;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a data-toggle="collapse" href="#use-your-library" class="dropdown-toggle collapsed" id="use-library-menu"> USE YOUR LIBRARY</a>
                        <div class="dropdown-menu col col-md-3 virtual-library-tour-use-library" id="use-your-library">
                            <div class="p-3">
                                <div class="container">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <ul>
                                                <li>
                                                    <a href="https://illiad.lib.byu.edu/illiad/IDA/">
                                                        InterLibrary Loan
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://maclab.byui.edu">
                                                        Mac Lab & 3D Printing
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://library.byui.edu/new-books">
                                                        New Books
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://hip.byui.edu/ipac20/ipac.jsp?profile=mck&menu=account&ts=1245939093723#focus">
                                                        Renew Materials
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://abish.byui.edu/library/ill-requests/index.cfm/requestform">
                                                        Request a Purchase
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://scheduling.byui.edu/Login.aspx">
                                                        Reserve a Study Room
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://www.byui.edu/special-collections">
                                                        Special Collections
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://byui.ask.libraryh3lp.com/questions/36032">
                                                        Wireless Printing
                                                    </a>
                                                </li>
                                                <!--
                                                <li>
                                                    <a href="#">
                                                        Software
                                                    </a>
                                                </li>
                                                -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a data-toggle="collapse" href="#about" class="dropdown-toggle collapsed" id="contact-menu">About</a>
                        <div class="dropdown-menu col col-md-3 virtual-library-tour-contact" id="about">
                            <div class="p-3">
                                <div class="container">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <ul>
                                                <li>
                                                    <a href="https://byui.libcal.com/">
                                                        Calendar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://library.byui.edu/contact">
                                                        Contact
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://byui.libcal.com/hours/">
                                                        Hours
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://library.byui.edu/maps">
                                                        Maps
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://library.byui.edu/policies">
                                                        Policies
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://abish.byui.edu/library/stats/">
                                                        Stats
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


</div>


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

<div class="container">

    @yield('content')

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
</a></body>
</html>