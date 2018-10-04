@extends('layouts.public')

@section('title')
    Mac Lab Contacts
@endsection

@section('breadcrumbs')
    <span> CONTACTS</span>
@endsection

@section('content')
    <h2>CONTACT US</h2>
    <div class="clearfix">&nbsp;</div>  
    <!-- TODO: add contact info -->
    <div class="row">
        <div class="col-md col-sm-6 contact">
            <i class="fa fa-envelope fa-3x"></i> 
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <p class="col-12">
                    mckaymaclab@byui.edu
                </p>
            </div>
        </div>
        <div class="col-md col-sm-6 contact">
            <i class="fa fa-phone fa-3x"></i>
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <p class="col-12">
                    208.496.9550
                </p>
            </div>
        </div>
        <div class="col-md col-sm-6 contact">
            <i class="fa fa-map-marker fa-3x"></i>
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <p class="col-12">
                    MCK 140A
                </p>
            </div>
        </div>
        <div class="col-md col-sm-6 contact">
            <i class="fab fa-instagram fa-3x"></i>
            <div class="clearfix">&nbsp;</div> 
            <div class="row">
                <a href="https://www.instagram.com/byui.maclab" class="col-12">Follow Us</a>
            </div>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>  

@endsection

@push('styles')
<style type="text/css">
    .contact { text-align: center; }
</style>
@endpush