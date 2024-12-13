@extends('layouts.back')
@section('content')
@php $todaysdate = date('m/d/Y'); 
$puppy->details = $puppy->puppy_details[0];
@endphp
<script>
   $('.date-picker').each(function(){
    $(this).datepicker({
        templates:{
            leftArrow: '<i class="now-ui-icons arrows-1_minimal-left"></i>',
            rightArrow: '<i class="now-ui-icons arrows-1_minimal-right"></i>'
        }
    }).on('show', function() {
            $('.datepicker').addClass('open');

            datepicker_color = $(this).data('datepicker-color');
            if( datepicker_color.length != 0){
                $('.datepicker').addClass('datepicker-'+ datepicker_color +'');
            }
        }).on('hide', function() {
            $('.datepicker').removeClass('open');
        });
});


</script>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit Puppy</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" style="display: none;" id="success">
                      <strong>Success!</strong> Puppy Updated Successfully <a href="" id="viewLink" target="_blank">View</a> 
                    </div>
                    <form name="newPuppy" method="POST" action="/admin/puppy/update/{{$puppy->id}}" id="newPuppy" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        {{-- <input type="hidden" name="id" value="{{ $puppy->id }}"> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Puppy Name" required="required" value="{{ $puppy->name }}">
                        </div>
                        <div class="form-group">
                            <label for="breed">Breed</label>
                            <select class="form-control" id="breed" name="breed_id" >
                                @foreach ($breeds as $breed)
                                <option value="{{ $breed->id }}" {{ $puppy->breed_id === $breed->id ? "selected" : " " }} {{ $breed->status === 0 ? "disabled" : " " }}>{{ $breed->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Price">Price:</label>
                            <input type="number" class="form-control" name="price" id="price" aria-describedby="Price"
                                placeholder="Price" value="{{ $puppy->price }}">
                        </div>
                        <div class="form-group dropzone card" id="my-dropzone">
                            {{-- <input type="file" class="form-control"  name="file"> --}}
                            <div class="dz-message" data-dz-message style="font-size: 30px;"><span>{{ __('Drop puppy images here to upload') }} <i  class="now-ui-icons media-1_camera-compact"></i></i></span></div>

                        </div>

                        <div class="form-group">
                            <label for="photodate">Date photos were taken:</label>
                            <input type="text" class="form-control date-picker" name="Photo_Date" value="{{ $puppy->details->Photo_Date ?? $todaysdate }}" data-datepicker-color="primary">
                          </div>
                        <div class="form-group">
                            <p>Gender:</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Gender" id="gender" value="male"
                                    {{ $puppy->details->Gender === 'male' ? 'checked' : ''}}>
                                    Male
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Gender" id="gender"
                                        value="female" {{ $puppy->details->Gender === 'female' ? 'checked' : ''}}> Female
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Size:</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Size" id="size" value="small"
                                    {{ $puppy->details->Size === 'small' ? 'checked' : ''}}>
                                    Small
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Size" id="size" value="medium"
                                    {{ $puppy->details->Size === 'medium' ? 'checked' : ''}}>
                                    Medium
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Size" id="size" value="large"
                                    {{ $puppy->details->Size === 'large' ? 'checked' : ''}}>
                                    Large
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="birthdate">Birthdate:</label>
                          <input type="text" class="form-control date-picker" name="Birth_Date" value="{{ $todaysdate }}" data-datepicker-color="primary">
                        </div>

                        <div class="form-group">
                            <label for="color">Color/Markings :</label>
                            <input type="text" class="form-control" name="Color" id="color" placeholder="Puppy Color" value="{{ $puppy->details->Color }}">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="availablity">Available for pickup from:</label>
                                <input type="text" class="form-control date-picker" name="Available_From" value="{{ $todaysdate }}" data-datepicker-color="primary">
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label for="">To:</label>
                                <input type="text" class="form-control date-picker" name="Available_To" value="{{ $todaysdate }}" data-datepicker-color="primary">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="puppydesc">Short Description :</label> 
                            <button class="btn btn-sm btn-info" type="button" id="aicreate">Generate with AI <i class="fa-solid fa-robot"></i></button>
                            <div name="description" id="puppyShortdesc" name="puppyShortdesc" class="htmledit">{!! $puppy->shortDescHtml !!}</div>
                            <input type="hidden" id="shortDescHtml" name="shortDescHtml" class="htmlvalue" value="{!! $puppy->shortDescHtml !!}">
                          </div>

                          <div class="form-group">
                            <label for="puppydesc">Description :</label> 
                            <div name="description" id="puppydesc" name="puppydesc" class="htmledit">{!! $puppy->puppyDescHtml !!}</div>
                            <input type="hidden" id="puppyDescHtml" name="puppyDescHtml" class="htmlvalue" value="{!! $puppy->puppyDescHtml !!}" >
                          </div>

                          <div class="form-group">
                            <p>Champion Bloodlines:</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Champion_Bloodlines" id="ChampionBloodlines" value="Yes">
                                    Yes
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Champion_Bloodlines" id="ChampionBloodlines"
                                        value="No"> No
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <p>Champion Sired:</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Champion_Sired" id="ChampionSired" value="Yes" {{ $puppy->details->Champion_Sired === 'Yes' ? 'checked' : ''}}>
                                    Yes
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Champion_Sired" id="ChampionSired"
                                        value="No" {{ $puppy->details->Champion_Sired === 'No' ? 'checked' : ''}}> No
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <p>Vaccinations and Dewormings:</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Vaccinations_And_Dewormings" id="VaccinationsAndDewormings" value="Yes" 
                                    {{ $puppy->details->Vaccinations_And_Dewormings === 'Yes' ? 'checked' : ''}}>
                                    Yes
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Vaccinations_And_Dewormings" id="VaccinationsAndDewormings"
                                        value="No" {{ $puppy->details->Vaccinations_And_Dewormings === 'No' ? 'checked' : ''}}> No
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <p>Health Certificate :</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Health_Certificate" id="HealthCertificate" value="Yes"
                                     {{ $puppy->details->Health_Certificate === 'Yes' ? 'checked' : ''}}>
                                    Yes
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Health_Certificate" id="HealthCertificate"
                                        value="No" {{ $puppy->details->Health_Certificate === 'No' ? 'checked' : ''}}> No
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                         <div class="form-group">
                            <p>Health Record :</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Health_Record" id="HealthRecord" value="Yes"
                                     {{ $puppy->details->Health_Record === 'Yes' ? 'checked' : ''}}>
                                    Yes
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Health_Record" id="HealthRecord"
                                        value="No" {{ $puppy->details->Health_Record === 'No' ? 'checked' : ''}}> No
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Health Warranty :</p>
                            <div class="form-check form-check-radio form-check-inline">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Health_Warranty" id="HealthWarranty" value="Yes"
                                    {{ $puppy->details->Health_Warranty === 'Yes' ? 'checked' : ''}}>
                                    Yes
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="Health_Warranty" id="HealthWarranty"
                                        value="No" {{ $puppy->details->Health_Warranty === 'No' ? 'checked' : ''}}> No
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
{{--                             
                            <label for="puppydesc">Short Description :</label> 
                            <button class="btn btn-sm btn-info" type="button" id="aicreate">Generate with AI <i class="fa-solid fa-robot"></i></button>
                            <button class="btn btn-sm btn-info" type="button" id="aicreateloading" style="display: none">Please wait a moment <i class="fa-solid fa-spinner fa-spin-pulse"></i></button>
                            <div name="description" id="shortDesc" name="puppyShortdesc" class="htmledit"></div>
                            <input type="hidden" id="shortDescHtml" name="shortDescHtml" class="htmlvalue" value="{{ $puppy->shortDescHtml }}">
                          </div>

                          <div class="form-group">
                            <label for="puppydesc">Description :</label> 
                            <div name="description" id="longDesc" name="puppydesc" class="htmledit"></div>
                            <input type="hidden" id="longDescHtml" name="puppyDescHtml" class="htmlvalue" value="" >
                          </div> --}}
                        <div class="form-group">
                            <label for="videoPreview">Video Preview:</label>
                            <input type="text" class="form-control" name="videoPreview" id="videoPreview" placeholder="https://www.youtube.com/watch?v=orL-w2QBiN8&pp"
                            value="{{ $puppy->videoPreview ?? ''}}">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitpuppy">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
