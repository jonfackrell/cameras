@extends('layouts.public')

@section('title')
    Mac Lab Contacts
@endsection

@section('breadcrumbs')
    <span> CONTACT US</span>
@endsection

@section('content')
    <!-- <h2>CONTACT US</h2> -->
    <div class="clearfix">&nbsp;</div>  
    <div class="row">
        <div class="col-md col-sm-6 contact">
            <i class="fa fa-envelope fa-3x green"></i> 
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <p class="col-12">
                    <a href='mailto:mckaymaclab@byui.edu'>mckaymaclab@byui.edu</a>
                </p>
            </div>
        </div>
        <div class="col-md col-sm-6 contact">
            <i class="fa fa-phone fa-3x green"></i>
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <p class="col-12">
                    208.496.9550
                </p>
            </div>
        </div>
        <div class="col-md col-sm-6 contact">
            <i class="fa fa-map-marker fa-3x green"></i>
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <p class="col-12">
                    MCK 140A
                </p>
            </div>
        </div>
        <div class="col-md col-sm-6 contact">
            <i class="fab fa-instagram fa-3x green"></i>
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <a href="https://www.instagram.com/byui.maclab" class="col-12">Follow Us</a>
            </div>
        </div>
        <div id="hours-container" class="col-md col-sm-6 contact">
            <i class="fa fa-clock fa-3x green"></i>
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                    <a id="current-hours-button" href="https://byui.libcal.com/hours/" class="col-12">7am - 11:30pm</a>
            </div>
        </div>
    </div>

    

    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9 col-12">
            <img class="img-fluid" src="/img/map.png" alt="Map of the First Floor West Wing"></a>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>  
@endsection

@push('styles')
<style type="text/css">
    .contact { text-align: center; }
</style>
@endpush

@push('footer-scripts')

<script type="text/javascript">
    // get today's hours
    var t=$("#current-hours-button");
    $.ajax({
        url:"https://api3.libcal.com/api_hours_today.php?iid=4251&lid=0&format=json&systemTime=0", 
        type:"GET", 
        dataType:"jsonp", 
        timeout:3e3, 
        success:function(n){ 
            var e=n.locations[0]; 
            if(1==e.times.currently_open?t.html(""+e.rendered):t.html("Closed"),n.hasOwnProperty("NOTICE")){
                var o='<br /><span style="font-size: 11px;">'+n.NOTICE+"</span>";
                t.append(o)
            }
            t.parents("div#hours-container").show()
        },
        error:function(n,e,o){t.parents("div#hours-container").hide()}});
</script>

@endpush
