<!-- stats-banner -->
<div class="row justify-content-start light">
                
    <a href="{{ route('equipment.admin', ['equipment_group' => 'camera']) }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
        <div class="clip-wrap stats-btn">
            {{ $cameraOut }}
        </div>
        <div>
            <small>CAMERA</small><br/> EQUIPMENT
        </div>
    </a>

    <a href="{{ route('equipment.admin', ['equipment_group' => 'other']) }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
        <div class="clip-wrap stats-btn">
            {{ $otherOut }}
        </div>
        <div>
            <small>OTHER</small><br/> EQUIPMENT
        </div>
    </a>
</div>
<!-- stats-banner -->