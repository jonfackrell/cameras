@extends('layouts.public')

@section('title')
    Library Mac Lab
@endsection

@section('breadcrumbs')
    <span> MAC LAB</span>
@endsection

@section('nav')
    <div class="row">
        <div class="col">
            <a href="{{ route('maclab-policies') }}">
                <div class="clip-wrap">
                    <div class="clip-each border-style-thin">
                    </div>
                </div>
                <div>
                    POLICIES
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('equipment.home') }}">
                <div class="clip-wrap">
                    <div class="clip-each border-style-thin">
                    </div>
                </div>
                <div>
                    DIGITAL EQUIPMENT
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('3d.home') }}">
                <div class="clip-wrap">
                    <div class="clip-each border-style-thin">
                    </div>
                </div>
                <div>
                    3D PRINTING
                </div>
            </a>
        </div>
    </div>
@endsection

@section('content')


    <h2>OPEN COMPUTER LAB</h2>
    <p>The purpose of David O. McKay Library Mac Lab is to provide students with a creative space to help them in their academic pursuits by providing access to software, hardware, and trained lab assistants.</p>
    <p>The Mac Lab provides access to several programs, both commercial and free, that facilitate the creation of digital media, 3D models, and software applications. Some of which are included below. This list is constantly changing to adapt to faculty requirements.</p>
    <p><strong>Adobe Creative Cloud Applications:</strong> Illustrator, Photoshop, InDesign, Premiere Pro, Acrobat, XD, and many others.</p>
    <p><strong>3D Printing:</strong> Cura, Maya, Inventor</p>
    <p><strong>Microsoft Office:</strong> Word, PowerPoint, Excel</p>
    <p><strong>Software Development:</strong> XCode, BBEdit, RStudio, NetBeans, Cyberduck</p>          
    
    <h2>HOURS</h2>
    <ul class="hours">
        <li><strong>Monday-Thursday: </strong> 7am - 11:30pm</li>
        <li><strong>Friday:</strong> 7am - 9pm</li>
        <li><strong>Saturday:</strong> 9am - 9pm</li>
        <li><strong>Sunday: </strong>Closed</li>
        <li>The Mac Lab is closed on Tuesday for Devotional from 2pm - 3pm.</li>
    </ul>
    <p>See the <a class="bluelink" href="http://library.byui.edu/library-information/library-hours.htm">Library Schedule</a> for Holiday Hours.</p>



@endsection


