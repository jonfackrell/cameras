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
                The Mac Lab Assistants come from a variety of majors and help students with anything from design projects created in Illustrator to setting a 3D model created and printing it for a design course.
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





