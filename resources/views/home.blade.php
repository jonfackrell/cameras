@extends('layouts.public')

@section('title')
    Library Mac Lab
@endsection

@section('breadcrumbs')
    <span> MAC LAB</span>
@endsection

@section('nav')
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid"  id="button-container">
        <div class="container">
            <div class="row justify-content-center">
                
                    <a href="{{ route('equipment.home') }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="{{ asset('/img/equipment.png') }}" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            <small>DIGITAL</small><br/> EQUIPMENT
                        </div>
                    </a>
                
                
                    <a href="{{ route('3d.home') }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="{{ asset('/img/3dPrinting.png') }}" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            <small>3D</small><br/> PRINTING
                        </div>
                    </a>
                
                
                    <a href="{{ route('maclab-policies') }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="{{ asset('/img/policies.png') }}" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            <small>OUR</small><br/> POLICIES
                        </div>
                    </a>


                    <a href="{{ route('maclab-contacts') }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
                        <div class="clip-wrap">
                            <div class="clip-each border-style-thin">
                                <img src="{{ asset('/img/contacts.png') }}" class="nav-icon">
                            </div>
                        </div>
                        <div>
                            <small>CONTACT</small><br/> US
                        </div>
                    </a>
               
            </div>
        </div>
    </div>
@endsection

@section('content')

    
    
    <div class="clearfix">&nbsp;</div>

    <!-- TODO: add What we do infographic -->
    <div class="row justify-content-center infographic">
        <div class="col-lg-10 col-12">
            <img class="img-fluid" src="{{ asset('/img/what-we-do-info.png') }}" alt="What We Do Inforgraphic" style="max-height: 375px; width: auto;"></a>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
                SOFTWARE &nbsp;&nbsp;&nbsp;<small>(This list is constantly changing to adapt to faculty requirements.)</small>
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>Adobe Creative Cloud Applications</h4>
            <p>
                Illustrator, Photoshop, InDesign, Premiere Pro, Acrobat, XD, and more
                <br />
                <br />
            </p>
            <h4>Microsoft Office</h4>
            <p>
                Word, PowerPoint, Excel
            </p>
        </div>
        <div class="col-md-6">
            <h4>3D Printing</h4>
            <p>
                Cura, Maya, Inventor
                <br />
                <br />
            </p>
            <h4>Software Development</h4>
            <p>
                XCode, BBEdit, RStudio, NetBeans, Cyberduck
            </p>
        </div>
    </div>
         
    
@endsection

@push('styles')
    <link rel='stylesheet' href='{{ asset("/css/macLab.css") }}'>
@endpush





