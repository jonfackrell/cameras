<!-- stats-banner -->
<div class="row justify-content-start light">
                
    <a href="{{ route('equipment.admin.checkouts', ['type' => 'camera-out']) }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
        <div class="clip-wrap stats-btn">
            {{ count($cameraOut) }}
        </div>
        <div>
            <small>CAMERA</small><br/> EQUIPMENT
        </div>
    </a>

    <a href="{{ route('equipment.admin.checkouts', ['type' => 'other-out']) }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
        <div class="clip-wrap stats-btn">
            {{ count($otherOut) }}
        </div>
        <div>
            <small>OTHER</small><br/> EQUIPMENT
        </div>
    </a>
</div>
<!-- stats-banner -->