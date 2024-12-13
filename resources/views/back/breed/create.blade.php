@extends('layouts.back')
@section('content')
@php $todaysdate = date('m/d/Y'); @endphp

<script>
    $('.date-picker').each(function () {
        $(this).datepicker({
            templates: {
                leftArrow: '<i class="now-ui-icons arrows-1_minimal-left"></i>',
                rightArrow: '<i class="now-ui-icons arrows-1_minimal-right"></i>'
            }
        }).on('show', function () {
            $('.datepicker').addClass('open');

            datepicker_color = $(this).data('datepicker-color');
            if (datepicker_color.length != 0) {
                $('.datepicker').addClass('datepicker-' + datepicker_color + '');
            }
        }).on('hide', function () {
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
                    <h4 class="card-title"> Add New Breed</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" style="display: none;" id="success">
                        <strong>Success!</strong> Breed Added Successfully <a href="" id="viewLink"
                            target="_blank">View</a>
                    </div>
                    <form name="newBreed" method="POST" action="/breed/add" id="newBreed" enctype="multipart/form-data" class="dropzoneform">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Breed Name"
                                required="required">
                        </div>
                        <div class="form-group dropzone card" id="my-dropzone">
                            {{-- <input type="file" class="form-control"  name="file"> --}}
                            <div class="dz-message" data-dz-message style="font-size: 30px;">
                                <span>{{ __('Drop breed images here to upload') }} <i
                                        class="now-ui-icons media-1_camera-compact"></i></i></span></div>

                        </div>

                        <div class="form-group">
                            <label for="breeddesc">Description :</label>
                            <div name="description" id="breeddesc" name="breeddesc" class="htmledit"></div>
                            <input type="hidden" id="breedDescHtml" name="breedDeschtml" class="htmlvalue">
                        </div>

                        <div class="form-group">
                            <label for="photodate">Meta Title:</label>
                            <input type="text" class="form-control date-picker" name="Photo_Date"
                                value="{{ $todaysdate }}" data-datepicker-color="primary">
                        </div>
                        <div class="form-group">
                            <label for="photodate">Meta Description:</label>
                            <input type="text" class="form-control date-picker" name="Photo_Date"
                                value="{{ $todaysdate }}" data-datepicker-color="primary">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitbreed">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
