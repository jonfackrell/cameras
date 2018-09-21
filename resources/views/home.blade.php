@extends('layouts.public')

@section('title')
    Library Mac Lab
@endsection

@section('breadcrumbs')
    <span> MAC LAB</span>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>
                <img class="img-fluid" src="https://content.byui.edu/items/0af2f055-7202-403e-9894-bb80478aa98c/1/maclab-header.jpg?.vi=fancy" alt="Mac Lab: MCK 140A">
            </p>

        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-md-6">
            <h2>OPEN COMPUTER LAB</h2>
            <p>The purpose of David O. McKay Library Mac Lab is to provide students with a creative space to help them in their academic pursuits by providing access to software, hardware, and trained lab assistants.</p>
            <p>The Mac Lab provides access to several programs, both commercial and free, that facilitate the creation of digital media, 3D models, and software applications. Some of which are included below. This list is constantly changing to adapt to faculty requirements.</p>
            <p><strong>Adobe Creative Cloud Applications:</strong> Illustrator, Photoshop, InDesign, Premiere Pro, Acrobat, XD, and many others.</p>
            <p><strong>3D Printing:</strong> Cura, Maya, Inventor</p>
            <p><strong>Microsoft Office:</strong> Word, PowerPoint, Excel</p>
            <p><strong>Software Development:</strong> XCode, BBEdit, RStudio, NetBeans, Cyberduck</p>
            <h2>POLICIES</h2>
            <p><strong>One computer per person</strong></p>
            <p><strong>We cannot assist you if you do not have a user name and password</strong></p>
            <p><strong>No food or drink</strong></p>
            <p><strong>Please take all phone/skype calls to the Commons to help keep noise level to a minimum</strong></p>
            <p><strong>If you leave your computer for 30 minutes you will be logged off and your belongings brought to Lost and Found</strong></p>
            <h2>DIGITAL EQUIPMENT</h2>
            <p><strong>Available Equipment:</strong> video cameras, digital cameras &amp; tripods</p>
            <div class="row">
                <figure class="col-md-6"><a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700"><img class="img-fluid" src="https://content.byui.edu/file/0af2f055-7202-403e-9894-bb80478aa98c/1/vixia.gif" alt="Cannon VIXIA HF R700"></a>
                    <figcaption><strong>Cannon VIXIA HF R700</strong><br> Click <a class="bluelink" href="https://www.usa.canon.com/internet/portal/us/home/products/details/camcorders/consumer/vixia/vixia-hf-r700">here</a> for more information.</figcaption>
                </figure>
                <figure class="col-md-6"><a class="bluelink" href="https://shop.usa.canon.com/shop/en/catalog/powershot-sx60-hs?utm_source=google&amp;utm_medium=Product_Search&amp;utm_campaign=Google_Product_Feed&amp;cm_mmc=GA-_-Digital_Point_&amp;_Shoot_Cameras-_-G_Canon_Product+Listing+Ads-_-35697&amp;gclid=CjwKCAjwzoDXBRBbEiwAGZRIeBOQ8uR0-AkAYn8-AolqhMJrv6hNAvBdADlVGnT8NEjCd2l6-dy7nhoClEIQAvD_BwE"><img class="img-fluid" src="https://content.byui.edu/file/0af2f055-7202-403e-9894-bb80478aa98c/1/powershot.jpg" alt="Cannon PowerShot SX60 HS"></a>
                    <figcaption><strong>Cannon PowerShot SX60 HS</strong><br> Click <a class="bluelink" href="https://shop.usa.canon.com/shop/en/catalog/powershot-sx60-hs?utm_source=google&amp;utm_medium=Product_Search&amp;utm_campaign=Google_Product_Feed&amp;cm_mmc=GA-_-Digital_Point_&amp;_Shoot_Cameras-_-G_Canon_Product+Listing+Ads-_-35697&amp;gclid=CjwKCAjwzoDXBRBbEiwAGZRIeBOQ8uR0-AkAYn8-AolqhMJrv6hNAvBdADlVGnT8NEjCd2l6-dy7nhoClEIQAvD_BwE&#10;">here</a> for more information.</figcaption>
                </figure>
            </div>
            <p><strong>Students:</strong> In order for students to check out camera equipment, it must be for academic use. Additionally, teacher approval is required for students to check out equipment. Students can have equipment for 24 hours after agreeing to our terms and conditions. To check out equipment for a longer period of time, it must be specified.</p>
            <p><strong>Staff/Faculty:</strong> Available at any time for rentals. Staff/faculty cannot use camera equipment for personal use, it must be for academic purposes. Staff/faculty can have equipment after agreeing to our terms and conditions.</p>
            <p id="largetext">Faculty can add students or request camera equipment using this link: <a class="bluelink" href="https://abish.byui.edu/cameras/index.cfm/authorize">Camera Authorization</a></p>
            <p><strong> Disclaimer:</strong> If the link is not working, faculty can email cameras@byui.edu to approve students. For questions or concerns feel free to contact us.</p>
            <h2>HOURS</h2>
            <ul class="hours">
                <li><strong>Monday-Thursday: </strong> 7am - 11:30pm</li>
                <li><strong>Friday:</strong> 7am - 9pm</li>
                <li><strong>Saturday:</strong> 9am - 9pm</li>
                <li><strong>Sunday: </strong>Closed</li>
                <li>The Mac Lab is closed on Tuesday for Devotional from 2pm - 3pm.</li>
            </ul>
            <p>See the <a class="bluelink" href="http://library.byui.edu/library-information/library-hours.htm">Library Schedule</a> for Holiday Hours.</p>
        </div>
    
        <div class="col-md-6">
            <div id='workshops' class='events'>
                <div class='events-heading'>
                    <h1 class='events-title'>UPCOMING WORKSHOPS</h1>
                </div>
                <div class='events-body'></div>
            </div>
            <figure>
                <img class="img-fluid" src="https://content.byui.edu/file/0af2f055-7202-403e-9894-bb80478aa98c/1/3dprintingimage_minus_link.png?.vi=fancy" alt="3d Printing">
                <figcaption id='link_for_3d_printing'><a class='bluelink' href='https://maclab.byui.edu/3d/'>3D Printing</a></figcaption>
            </figure>
        </div>
    </div>

@endsection

@push('header-scripts')
    <!-- Handlebars.js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js'></script>
    <!-- Moment.js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js'></script>
    <!-- handlebars temple for workshops -->
    <script id="workshops-template" type="text/x-handlebars-template">
        @{{#if title}}
        <div class="workshop row">
            <div class="workshop-left col-sm-4">
                <h3>@{{{date}}}</h3>   
            </div>
            <div class="workshop-main col-sm-8">
                <h3 class="workshop-heading">
                    <a href="@{{url.public}}" class='bluelink'>@{{title}}</a>
                </h3>
                <div class='worshop-body'>
                    @{{{description}}}
                    <p>
                        <em><span>@{{{start_time}}} - @{{{end_time}}}</span> @{{#if location.name}} | @{{{location.name}}}@{{/if }}</em>
                    </p>
                </div>
            </div>
        </div>
        @{{/if}}
    </script>
    <!-- Workshops -->
    <script src='https://content.byui.edu/file/0af2f055-7202-403e-9894-bb80478aa98c/1/workshops.js'></script>
@endpush

