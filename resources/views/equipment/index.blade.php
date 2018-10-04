@extends('layouts.public')

@section('title')
    Digital Equipment
@endsection

@section('breadcrumbs')
    <span> DIGITAL EQUIPMENT</span>
@endsection


@section('content')


            
    <h2>DIGITAL EQUIPMENT</h2>

    <div class="clearfix">&nbsp;</div>

    <ul>
        <li><h4>Available Equipment (Upon Authorization):</h4>video cameras, digital cameras &amp; tripods</li>
    </ul>


    <div class="row">
        <div class="col-md-6">

            <div class="clearfix">&nbsp;</div>
            
            <div class="infographic">
                <img class="img-fluid" src="/img/stu-check-out-info.png" alt="Student Check Out Inforgraphic"></a>
            </div>
            <div class="clearfix">&nbsp;</div>

        </div>
        <div class="col-md-6">

            <div class="clearfix">&nbsp;</div>
            
            <div class="infographic">
                <img class="img-fluid" src="/img/fac-check-out-info.png" alt="Faculty Check Out Inforgraphic"></a>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="row justify-content-center">
                <a class="btn" href="https://abish.byui.edu/cameras/index.cfm/authorize"><button id='authorization' class="btn btn-default authorization">Click Here for Authorization</button></a>
            </div>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
            
    <h2>IN HOUSE EQUIPMENT</h2>

    <div class="clearfix">&nbsp;</div>

    <ul>
        <li><h4>Available Equipment:</h4>headphones, Wacom tablets, HDMI cables, etc.</li>
    </ul>

    <div class="clearfix">&nbsp;</div>
    

@endsection


@section('banner')
    <div class="clearfix">&nbsp;</div>
    <div class="container" id="slideContainer">
        <div id="slideViewer" class="col-8">
            <div class="slideShow">
                <!-- Cameras -->
                <figure class="slides"><a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700"><img class="img-fluid" src="/img/vixia.gif" alt="Cannon VIXIA HF R700"></a>
                    <figcaption><strong>Cannon VIXIA HF R700</strong><br> Click <a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700">here</a> for more information.</figcaption>
                </figure>
                <figure class="slides"><a class="bluelink" href="https://shop.usa.canon.com/shop/en/catalog/powershot-sx60-hs?utm_source=google&amp;utm_medium=Product_Search&amp;utm_campaign=Google_Product_Feed&amp;cm_mmc=GA-_-Digital_Point_&amp;_Shoot_Cameras-_-G_Canon_Product+Listing+Ads-_-35697&amp;gclid=CjwKCAjwzoDXBRBbEiwAGZRIeBOQ8uR0-AkAYn8-AolqhMJrv6hNAvBdADlVGnT8NEjCd2l6-dy7nhoClEIQAvD_BwE"><img class="img-fluid" src="/img/powershot.jpg" alt="Cannon PowerShot SX60 HS"></a>
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
                <figure class="slides"><a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700"><img class="img-fluid" src="/img/vixia.gif" alt="Cannon VIXIA HF R700"></a>
                    <figcaption><strong>Cannon VIXIA HF R700</strong><br> Click <a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700">here</a> for more information.</figcaption>
                </figure>
            </div>
            <button class="slideShowButton left">&#10094;</button>
            <button class="slideShowButton right">&#10095;</button>
        </div>
    </div>
@endsection


@push('styles')

@endpush
<style>
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
