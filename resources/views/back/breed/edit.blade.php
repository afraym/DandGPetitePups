@extends('layouts.back')
@section('content')
@php $todaysdate = date('m/d/Y');
// dd($breed)
 @endphp
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit Breed</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" style="display: none;" id="success">
                        <strong>Success!</strong> Breed Updated Successfully <a href="" id="viewLink"
                            target="_blank">View</a>
                    </div>
                    <form name="newBreed" method="POST" action="/admin/breed/update/{{ $breed->id }}" id="newBreed" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Breed Name"
                                required="required" value="{{ $breed->name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image:</label>
                            <br>
                            <a href="/breeds/{{ $breed->image }}" target="_blank" rel="noopener noreferrer">
                                <img src="/breeds/{{ $breed->image }}" alt="{{ $breed->name}}" class="img-thumbnail" style="width: 35%; height:20%">
                              </a>
                        </div>
                        <label for="exampleInputEmail1">Replace Image:</label>
                        <div class="form-group dropzone card" id="my-dropzone">
                            {{-- <input type="file" class="form-control"  name="file"> --}}
                            <div class="dz-message" data-dz-message style="font-size: 30px;">
                                <span>{{ __('Drop breed image here to upload') }} <i
                                        class="now-ui-icons media-1_camera-compact"></i></i></span></div>

                        </div>

                        <div class="form-group">
                            <label for="breeddesc">Description :</label>
                            <div name="description" id="breeddesc" name="breeddesc" class="htmledit">{!! $breed->description !!}</div>
                            <input type="hidden" id="breedDescHtml" name="breeddeschtml" class="htmlvalue" value="{!! $breed->description !!}">
                        </div>

                        <div class="form-group">
                            <label for="metaTitle">Meta Title:</label>
                            <input type="text" class="form-control" name="metaTitle"
                                value="{{ $breed->metaTitle }}" data-datepicker-color="primary">
                        </div>
                        <div class="form-group">
                            <label for="metaDescription">Meta Description:</label>
                            <input type="text" class="form-control" name="metaDescription"
                                value="{{ $breed->metaDescription }}" data-datepicker-color="primary">
                        </div>
                        <div class="form-group">
                            <label for="metaKeywords">Meta Keywords:</label>
                            <input type="text" class="form-control" name="metaKeywords"
                                value="{{ $breed->metaKeywords }}" data-datepicker-color="primary">
                                <small id="metaKeywords" class="form-text text-muted">Separate each word with a comma ,</small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitbreed">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
