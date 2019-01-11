@extends('layouts.public')

@section('title')
    Mac Lab Policies
@endsection

@section('breadcrumbs')
    <a href="{{ route('maclab.home') }}">MAC LAB</a>
    /
    <span> POLICIES</span>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
                MISSION
            </h2>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>

    <!--<h2>OPEN COMPUTER LAB</h2>-->
    <p>The purpose of David O. McKay Library Mac Lab is to provide students with a creative space to help them in their academic pursuits by providing access to software, hardware, and trained lab assistants. The Mac Lab provides access to several programs, both commercial and free, that facilitate the creation of digital media, 3D models, and software applications. </p>


    <div class="clearfix">&nbsp;</div>  
    <!-- TODO: add policies infographic -->
    <div class="row justify-content-center infographic">
        <div class="col-lg-10 col-12">
	        <img class="img-fluid" src="/img/policies-info.png" alt="Policies Inforgraphic" style="max-height: 525px; width: auto;"></a>
	    </div>
    </div>
    <div class="clearfix">&nbsp;</div>


    <div class="row">
        <div class="col-md-12">
            <h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
                TERMS & CONDITIONS FOR EQUIPMENT CHECKOUT
            </h2>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>

    <h4>Camera Equipment</h4>

    <ul class="bullets">
        <li>Equipment is for academic use only.</li>

        <li>You are responsible for any repair / replacement if any items you checkout are damaged.</li>

        <li>You can only check out and return equipment for yourself.</li>

        <li>A fee of $10 per day will be charged to your acount for any late items.</li>
    </ul>

    <h4>Other Equipment</h4>

    <ul class="bullets">
        <li>The equipment must stay in the Library at all times.</li>

        <li>The equimpent may be on any floor in the Library. This exclude any tablets and their pens.</li>

        <li>All tablets and pens must stay in the Mac Lab.</li>

        <li>The equipment is due back 15 minutes before the Library closes.</li>
    </ul>

@endsection
