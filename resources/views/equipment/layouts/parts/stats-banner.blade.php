<!-- stats-banner -->
<div class="row justify-content-start light">
                
    <a href="{{ route('equipment.admin.checkouts', ['type' => 'digital-out']) }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
        <div class="clip-wrap stats-btn">
            {{ count($cameraOut) }}
        </div>
        <div>
            <small>CAMERA</small><br/> EQUIPMENT
        </div>
    </a>

    <a href="{{ route('equipment.admin.checkouts', ['type' => 'in-house-out']) }}" class="col-lg-2 col-sm-3 col-6 btn btn-light">
        <div class="clip-wrap stats-btn">
            {{ count($inHouseOut) }}
        </div>
        <div>
            <small>IN-HOUSE</small><br/> EQUIPMENT
        </div>
    </a>
</div>
<!-- stats-banner -->