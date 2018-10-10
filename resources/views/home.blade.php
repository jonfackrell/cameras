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

    <!--<h2>OPEN COMPUTER LAB</h2>-->
    <p>The purpose of David O. McKay Library Mac Lab is to provide students with a creative space to help them in their academic pursuits by providing access to software, hardware, and trained lab assistants. The Mac Lab provides access to several programs, both commercial and free, that facilitate the creation of digital media, 3D models, and software applications. Some of which are included below. This list is constantly changing to adapt to faculty requirements.</p>
    <ul>
        <li><h4>Adobe Creative Cloud Applications:</h4>Illustrator, Photoshop, InDesign, Premiere Pro, Acrobat, XD, and many others.</li>
        <li><h4>3D Printing:</h4>Cura, Maya, Inventor</li>
        <li><h4>Microsoft Office:</h4>Word, PowerPoint, Excel</li>
        <li><h4>Software Development:</h4>XCode, BBEdit, RStudio, NetBeans, Cyberduck</li>
    </ul>
         
    
@endsection





