@extends('layouts.public')

@section('title')
    Library Mac Lab
@endsection

@section('breadcrumbs')
    <span> MAC LAB</span>
@endsection

@section('nav')
    <div class="container-fluid"  id="button-container">
        <div class="container">
            <div class="row justify-content-center">
                
                    <a href="{{ route('equipment.home') }}" class="col-3 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="/img/equipment.png" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            DIGITAL EQUIPMENT
                        </div>
                    </a>
                
                
                    <a href="{{ route('3d.home') }}" class="col-3 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="/img/3dPrinting.png" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            3D PRINTING
                        </div>
                    </a>
                
                
                    <a href="{{ route('maclab-policies') }}" class="col-3 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="/img/policies.png" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            POLICIES
                        </div>
                    </a>


                    <a href="{{ route('maclab-contacts') }}" class="col-3 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="/img/contacts.png" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            CONTACTS
                        </div>
                    </a>
               
            </div>
        </div>
    </div>
@endsection

@section('content')

    
    <div id="hours-container" class="container" style="text-align: center;">
        <a href="https://byui.libcal.com/hours/">
            <h2 id="hours-button">Today's Hours: 7am - 11:30pm</h2>
        </a>
    </div>
    <div class="clearfix">&nbsp;</div>

    <!-- TODO: add What we do infographic -->
    <div class="infographic" style="height: 375px;"></div>
    <div class="clearfix">&nbsp;</div>

    <!--<h2>OPEN COMPUTER LAB</h2>-->
    <p>The purpose of David O. McKay Library Mac Lab is to provide students with a creative space to help them in their academic pursuits by providing access to software, hardware, and trained lab assistants. The Mac Lab provides access to several programs, both commercial and free, that facilitate the creation of digital media, 3D models, and software applications. Some of which are included below. This list is constantly changing to adapt to faculty requirements.</p>
    <ul>
        <li><h4>Adobe Creative Cloud Applications:</h4>Illustrator, Photoshop, InDesign, Premiere Pro, Acrobat, XD, and many others.</li>
        <li><h4>3D Printing:</h4>Cura, Maya, Inventor</li>
        <li><h4>Microsoft Office:</h4>Word, PowerPoint, Excel</li>
        <li><h4>Software Development:</h4>XCode, BBEdit, RStudio, NetBeans, Cyberduck</li>
    </ul>
         
    
@endsection

@push('footer-scripts')

<script type="text/javascript">
    var t=$("#hours-button");
    $.ajax({
        url:"https://api3.libcal.com/api_hours_today.php?iid=4251&lid=0&format=json&systemTime=0", 
        type:"GET", 
        dataType:"jsonp", 
        timeout:3e3, 
        success:function(n){ 
            var e=n.locations[0]; 
            if(1==e.times.currently_open?t.html("Today's Hours: "+e.rendered):t.html("Closed"),n.hasOwnProperty("NOTICE")){
                var o='<br /><span style="font-size: 11px;">'+n.NOTICE+"</span>";
                t.append(o)
            }
            t.parents("div#hours-container").show()
        },
        error:function(n,e,o){t.parents("div#hours-container").hide()}});
</script>

@endpush

