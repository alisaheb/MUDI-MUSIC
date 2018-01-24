<div class="form-group">
  <label for="inputEmail" class="col-lg-4 control-label">{{Lang::get('conversion.lead_name')}}</label>
    <div class="col-lg-8">
        <input value="{{Input::old('band_lead_name')}}{{$getlicense->band_lead_name}}" name="band_lead_name" type="text" class="form-control" id="inputEmail" placeholder="Lead Name">
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-lg-4 control-label">{{Lang::get('conversion.band_name')}}</label>
    <div class="col-lg-8">
      <input value="{{Input::old('band_name')}}{{$getlicense->band_name}}"  name="band_name" type="text" class="form-control" id="inputPassword" placeholder="Band Name">
    </div>
</div>
<legend>{{Lang::get('conversion.license_type')}}</legend>
  <div class="row">
    @foreach($licensetypes as $licensetype)
      <div class="col-md-4 check-radio" >
        <div class="list-group">
          <a href="#" class="list-group-item">
            <div class="radio">
              <label>
                <input type="radio" name="license_type" id="optionsRadios2" value="{{$licensetype->license_type_id}}" @if($checklicense == 1 && $licensetype->license_type_id == $getLicenseKey[0]->ref_license_type_id ) {{'checked'}} @endif >
                <h4 class="list-group-item-heading">{{$licensetype->license_name}}</h4>
              </label>
            </div>
            <p class="list-group-item-text">{{Lang::get('conversion.validity')}}:{{$licensetype->validity}}</p>
            <p class="list-group-item-text">{{Lang::get('conversion.update_availability')}}:{{$licensetype->update_applicable_days}}</p>
            <p class="list-group-item-text">{{Lang::get('conversion.free_practice_total')}}:{{$licensetype->free_practice_total}}</p>
            <p class="list-group-item-text">{{Lang::get('conversion.device_allow')}}:{{$licensetype->devices_allowed_total}}</p>
          </a>
        </div>
      </div>
     @endforeach        
  </div>
