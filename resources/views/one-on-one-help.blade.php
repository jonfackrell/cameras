@extends('layouts.public')

@section('title')
    Library Mac Lab
@endsection

@section('breadcrumbs')
    <a href="{{ route('maclab.home') }}">MAC LAB</a>
    /
    <span> ONE-ON-ONE HELP</span>
@endsection

@section('content')
    
    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
                ONE-ON-ONE HELP
            </h2>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <!-- TODO:  -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-12">
            <p>
                The Mac Lab student assistants are available during the libraries hours of operation. Students are hired with previous knowledge and experience in several of the applications that the lab supports and provided with time for professional development to further their technical skill in areas they are expected to support. They strive to give high quality professional customer service as they help groups and provide one-on-one help.
            </p>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
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
                Cura, Slic3r, Maya, Inventor
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





