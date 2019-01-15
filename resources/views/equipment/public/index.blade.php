@extends('layouts.public')

@section('title')
    Digital Equipment
@endsection

@section('breadcrumbs')
    <a href="{{ route('maclab.home') }}">MAC LAB</a>
    /
    <span> DIGITAL EQUIPMENT</span>
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="infographic">
                <img class="img-fluid" src="{{ asset('/img/check-out-info.png') }}" alt="Equipment Check Out Inforgraphic"></a>
            </div>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <a class="btn" href="{{ route('equipment.patron.profile') }}"><button id='authorization' class="btn btn-default authorization">View Account</button></a>
                <a class="btn" href="{{ route('equipment.patron.terms') }}"><button id='authorization' class="btn btn-default authorization">View / Accept Terms</button></a>
            </div>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
                EQUIPMENT AVAILABLE FOR CHECKOUT
            </h2>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <ul id="books" role="grid" class="a-ordered-list a-vertical">
    @foreach ($equipmentTypes->groupBy('group') as $key => $groups)


            @foreach($groups as $equipment)

                <li role="gridCell" class="zg-item-immersion">
                    <span class="a-list-item">
                        <div class="a-section a-spacing-none aok-relative" style="position: relative;">
                            <span style="margin: 2px 6px; position: absolute; right: 0px; font-weight: bold; color: #525252;">{{ $equipment->available_count }} / {{ $equipment->equipment_count }}</span>
                            <div class="a-row a-spacing-none aok-inline-block">
                                <span class="a-size-small aok-float-left zg-badge-body zg-badge-color">
                                    <span class="zg-badge-text">{{ strtoupper($equipment->group) }}</span>
                                </span>
                                <span class="aok-float-left zg-badge-triangle zg-badge-color"></span>
                            </div>
                            <span class="aok-inline-block zg-item">
                                <a href="{{ route('equipment.show', ['equipmentType' => $equipment]) }}" class="a-link-normal">
                                {{--<a href="#" class="a-link-normal">--}}
                                    <span class="zg-text-center-align">
                                        <div class="a-section a-spacing-small">
                                            <img alt="" src="{{ ((count($equipment->getMedia('equipment-type')) > 0)?$equipment->getMedia('equipment-type')[0]->getUrl('thumb'):'') }}" style="max-height: 200px;">
                                        </div>
                                    </span>
                                    <div aria-hidden="true" data-rows="" title="{{ $equipment->display_name }}" class="p13n-sc-truncated">
                                        {{ $equipment->display_name }}
                                    </div>
                                </a>
                                <div class="a-row a-size-small">
                                    <span class="a-size-small a-color-base"></span>
                                </div>
                                <div class="a-row">
                                    <a href="http://hip.byui.edu/ipac20/ipac.jsp?index=bib&amp;term=4646738" class="a-link-normal a-text-normal">
                                        <span class="a-size-base a-color-price">
                                            <span class="p13n-sc-price"></span>
                                        </span>
                                    </a>
                                    <span style="position: relative; top: 2px;">
                                        <i role="img" aria-label="Prime" class="a-icon a-icon-prime a-icon-small"></i>
                                    </span>
                                </div>
                                <div class="a-row">
                                    <span class="zg-release-date"></span>
                                </div>
                            </span>
                        </div>
                    </span>
                </li>

            @endforeach


    @endforeach
    </ul>

    

@endsection


@section('banner')
    {{--<div class="clearfix">&nbsp;</div>
    <div class="container" id="slideContainer">
        <div id="slideViewer" class="col-lg-5 col-md-6 col-8">
            <div class="slideShow">
                <!-- Cameras -->
                <figure class="slides"><a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700"><img class="img-fluid" src="{{ asset('/img/vixia.gif') }}" alt="Cannon VIXIA HF R700"></a>
                    <figcaption><strong>Cannon VIXIA HF R700</strong><br> Click <a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700">here</a> for more information.</figcaption>
                </figure>
                <figure class="slides"><a class="bluelink" href="https://shop.usa.canon.com/shop/en/catalog/powershot-sx60-hs?utm_source=google&amp;utm_medium=Product_Search&amp;utm_campaign=Google_Product_Feed&amp;cm_mmc=GA-_-Digital_Point_&amp;_Shoot_Cameras-_-G_Canon_Product+Listing+Ads-_-35697&amp;gclid=CjwKCAjwzoDXBRBbEiwAGZRIeBOQ8uR0-AkAYn8-AolqhMJrv6hNAvBdADlVGnT8NEjCd2l6-dy7nhoClEIQAvD_BwE"><img class="img-fluid" src="{{ asset('/img/powershot.jpg') }}" alt="Cannon PowerShot SX60 HS"></a>
                    <figcaption><strong>Cannon PowerShot SX60 HS</strong><br> Click <a class="bluelink" href="https://shop.usa.canon.com/shop/en/catalog/powershot-sx60-hs?utm_source=google&amp;utm_medium=Product_Search&amp;utm_campaign=Google_Product_Feed&amp;cm_mmc=GA-_-Digital_Point_&amp;_Shoot_Cameras-_-G_Canon_Product+Listing+Ads-_-35697&amp;gclid=CjwKCAjwzoDXBRBbEiwAGZRIeBOQ8uR0-AkAYn8-AolqhMJrv6hNAvBdADlVGnT8NEjCd2l6-dy7nhoClEIQAvD_BwE&#10;">here</a> for more information.</figcaption>
                </figure>
                <!-- Tablets -->
                <figure class="slides"><a class="bluelink" href="https://www.wacom.com/en-us/products/pen-displays/wacom-intuos-pro"><img class="img-fluid" src="https://www.wacom.com/-/media/images/products/slides/gallery%20images/wacom%20intuos%20pro/wacom%20intuos%20pro%20gallery%20g2.jpg" alt="Wacom Intuos Pro"></a>
                    <figcaption><strong>Wacom Intuos Pro</strong><br> Click <a class="bluelink" href="https://www.wacom.com/en-us/products/pen-tablets/wacom-intuos-pro">here</a> for more information.</figcaption>
                </figure>
                <figure class="slides"><a class="bluelink" href="https://www.wacom.com/en-us/products/pen-tablets/wacom-cintiq-pro-24"><img class="img-fluid" src="https://www.wacom.com//-/media/images/products/slides/gallery images/wacom-cintiq-pro-2018/wacom cintiq pro 24 - g3.jpg" alt="Wacom Cintiq Pro"></a>
                    <figcaption><strong>Wacom Cintiq Pro</strong><br> Click <a class="bluelink" href="https://www.wacom.com/en-us/products/pen-tablets/wacom-intuos-pro">here</a> for more information.</figcaption>
                </figure>
                <!-- First Slide Repeat -->
                <figure class="slides"><a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700"><img class="img-fluid" src="{{ asset('/img/vixia.gif') }}" alt="Cannon VIXIA HF R700"></a>
                    <figcaption><strong>Cannon VIXIA HF R700</strong><br> Click <a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700">here</a> for more information.</figcaption>
                </figure>
            </div>
            <button class="slideShowButton left">&#10094;</button>
            <button class="slideShowButton right">&#10095;</button>
        </div>
    </div>

    <div class="container">
        <div class="clearfix">&nbsp;</div>
        <div class="row justify-content-center">
            <a class="btn" href="{{ route('equipment.patron.profile') }}"><button id='authorization' class="btn btn-default authorization">View Checkout Profile</button></a>
        </div>
    </div>--}}
@endsection


@push('styles')
    <style>
        #books {
            margin-left: 0;
        }
        #books img {
            vertical-align: top;
            max-width: 100%;
            border: 0;
            background-image: url('/img/book-cover.jpg');
            background-size: cover;
        }
        .a-ordered-list, .a-unordered-list, ol, ul {
            padding: 0;
        }
        .zg-item-immersion, #zg-other-container {
            border: 1px solid #ddd;
            margin-bottom: -1px;
            margin-right: -1px;
            vertical-align: top;
        }
        .zg-item-immersion {
            width: 272px;
            height: 290px;
            display: inline-block;
        }
        .a-ordered-list li, .a-unordered-list li, ol li, ul li {
            word-wrap: break-word;
            margin: 0;
        }
        .a-ordered-list li, ol li {
            list-style: decimal;
        }
        .a-spacing-small, .a-ws .a-ws-spacing-small {
            margin-bottom: 10px!important;
        }
        .zg-text-center-align {
            text-align: center;
        }
        .a-inline-block, .aok-inline-block {
            display: inline-block;
        }
        .zg-item {
            padding: 15px 15px 22px 15px;
            width: 278px;
            height: 250px;
            position: relative;
        }
        #books a{
            text-transform: capitalize;
        }
        #books a, #books a:active, #booksa:link, #books a:visited {
            text-decoration: none;
            color: #000000;
        }
        #books a:hover{
            text-decoration: underline;
        }
        .p13n-sc-truncated{
            width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            position: absolute;
            bottom: 0px;
        }
        .zg-badge-body.zg-badge-color {
            background-color: #525252;
        }
        .a-float-left, .aok-float-left {
            float: left!important;
        }
        .a-size-small {
            font-size: 12px!important;
            line-height: 1.5!important;
        }
        .zg-badge-body {
            height: 25px;
        }
        .zg-badge-text {
            font-size: 14px;
            line-height: 25px;
            padding: 0 8px;
            color: #fff;
        }
        .zg-badge-triangle.zg-badge-color {
            color: #525252;
        }
        .a-float-left, .aok-float-left {
            float: left!important;
        }
        .zg-badge-triangle {
            width: 0;
            height: 0;
            border-right: 10px solid transparent;
            border-top: 25px solid;
        }
        .ais-pagination--link{
            cursor: pointer;
        }
    </style>
    <style>

        @media screen and (min-width: 768px) {
            .container.breadcrumbs { max-height: 38px; }
        }

        #authorization {
            background-color: #a9d04c;
            border-color: #a9d04c;
        }

        #authorization:hover {
            opacity: .8;
        }

        #slideContainer {
        }
        #slideViewer {
            border: #fff solid;
            position: relative;
            margin: auto;
            overflow: hidden;
            padding-left: 0;
            background-color: white;
        }
        .slideShow {
            display: block;
            width: 10000px;
        }
        .slideShowButton {
            background-color: transparent;
            color: #fff;
            padding: 8px 16px;
            cursor: pointer;
            border: none;
            position: absolute;
            top: 50%;
            transform: translate(0%, -50%);
            z-index: 10;
            text-shadow: 0px 0px 5px #888;
        }
        .slideShowButton:hover {
            text-shadow: 0px 0px 5px #525252;
        }
        .right {
            right: 0%;
        }
        .left {
            left: 0%;
        }
        .slides {
            float: left;
            width:   100%;
            max-width: 1140px;
        }

    </style>
@endpush

@push('header-scripts')
<script>
    $(function() {
        var slideContainer = $('#slideContainer');
        var slideViewer = $('#slideViewer');
        var slideShow = $('.slideShow');
        var slides = $('.slides');

        var leftBtn = $('.slideShowButton.left');
        var rightBtn = $('.slideShowButton.right');

        // set index to the first slide
        var slideIndex = 0;
        var width = 1140;
        var animateSpeed = 1000;
        var pause = 3000;

        var interval;

        function slideLeft() {
            // change slide one to the left
            if (slideIndex <= 0) {
                slideShow.css('margin-left', -1 * slideIndex * width);
                slideIndex = slides.length - 1;
            }
            slideShow.animate({'margin-left': '+=' + width}, animateSpeed, function() {
                slideIndex--;
            });
        }
        
        function slideRight() {
            // change slide one to the right
            slideShow.animate({'margin-left': '-=' + width}, animateSpeed, function() {
                slideIndex++;
                if (slideIndex >= slides.length - 1) {
                    slideIndex = 0;
                    slideShow.css('margin-left', 0);
                }
            });
        }
        
        function startSlideShow() {
            interval = setInterval(slideRight, pause);  
        }

        function stopSlideShow() {
            clearInterval(interval);
        }

        function setWidth() {
            width = slideViewer.outerWidth() + 10;
            slides.css('max-width', width);
        }

        slideShow.on('mouseenter', stopSlideShow).on('mouseleave', startSlideShow);

        rightBtn.on('click', slideRight);
        leftBtn.on('click', slideLeft);

        $(window).resize(setWidth);

        setWidth();

        //startSlideShow();
    });
</script>
@endpush
