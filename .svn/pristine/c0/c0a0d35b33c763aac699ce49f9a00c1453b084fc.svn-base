@extends('mudidashboard.master')
@section('content-header')
  <h1>
    {{Lang::get('conversion.license')}}
    <small>{{ $page_description or null }}</small>
  </h1>
  <!-- You can dynamically generate breadcrumbs here -->
  {{--<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>--}}

@stop

@section('main')

{{--my code      --}}
      <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
          <!-- Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{Lang::get('conversion.get_license')}}</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

              <?php $checklicense =  $getLicenseKey->count(); ?>
              @if($checklicense == 1)
                <div class="list-group list-group-item current-license">
                  <fieldset>
                    <legend>{{Lang::get('conversion.current_license')}} </legend>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      {{Lang::get('conversion.click_here_for_license_information')}}
                    </button>
                    <div class="collapse" id="collapseExample">
                      <div class="well">
                        <p>{{Lang::get('conversion.your_license_type')}}&nbsp;<strong>: {{$getLicenseKey[0]->licenseType->license_name}}</strong></p>
                        <p>{{Lang::get('conversion.your_band_id')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>: {{$get_user->user_name}}</strong></p>
                        <p>{{Lang::get('conversion.your_band_key')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     <strong>: {{$getLicenseKey[0]->ref_band_key}}</strong></p>
                      </div>
                    </div>
                  </fieldset>
                </div>
              @endif

                {{ Former::horizonal_open()->action(route('getlicenses.store'))->method('POST') }}
                <div class="list-group list-group-item">
                  <fieldset>
                    <legend>{{Lang::get('conversion.band_information')}}</legend>

                    @if($errors->has())
                      <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h4>Warning!</h4>
                        @foreach ($errors->all() as $error)
                          <p>{{$error}}</p>
                        @endforeach

                      </div>
                    @endif

                    @include('getlicenses.fields')

                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">{{Lang::get('conversion.reset')}}</button>
                        <button type="submit" class="btn btn-primary">{{Lang::get('conversion.save')}}</button>
                      </div>
                    </div>
                  </fieldset>
                </div>
                {{Former::close()}}



            </div><!-- /.box-body -->

          </div><!-- /.box -->
        </div><!-- /.col -->
      </div>
		
@stop

@section('footer')
    <script type="text/javascript">
      $(".check-radio").on('click',function(){
        var sss = $(this).find("#optionsRadios2").prop('checked', true);
      });
    </script>
@stop