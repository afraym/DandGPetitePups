@extends('layouts.back')
@section('content')
@php $todaysdate = date('m/d/Y');
// dd($user)
 @endphp
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit User</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" style="display: none;" id="success">
                        <strong>Success!</strong> User Updated Successfully <a href="" id="viewLink"
                            target="_blank">View</a>
                    </div>
                    <form name="newUser" method="POST" action="/admin/user/update/{{ $user->id }}" id="newUser" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="User Name"
                                required="required" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image:</label>
                            <br>
                            <a href="/users/{{ $user->image }}" target="_blank" rel="noopener noreferrer">
                                <img src="/users/{{ $user->image }}" alt="{{ $user->name}}" class="img-thumbnail" style="width: 35%; height:20%">
                              </a>
                        </div>
                        <label for="exampleInputEmail1">Replace Image:</label>
                        <div class="form-group dropzone card" id="my-dropzone">
                            {{-- <input type="file" class="form-control"  name="file"> --}}
                            <div class="dz-message" data-dz-message style="font-size: 30px;">
                                <span>{{ __('Drop user image here to upload') }} <i
                                        class="now-ui-icons media-1_camera-compact"></i></i></span></div>

                        </div>

                        <div class="form-group">
                            <label for="userdesc">Description :</label>
                            <div name="description" id="userdesc" name="userdesc" class="htmledit">{!! $user->description !!}</div>
                            <input type="hidden" id="userDescHtml" name="userdeschtml" class="htmlvalue" value="{!! $user->description !!}">
                        </div>

                        <div class="form-group">
                            <label for="metaTitle">Meta Title:</label>
                            <input type="text" class="form-control" name="metaTitle"
                                value="{{ $user->metaTitle }}" data-datepicker-color="primary">
                        </div>
                        <div class="form-group">
                            <label for="metaDescription">Meta Description:</label>
                            <input type="text" class="form-control" name="metaDescription"
                                value="{{ $user->metaDescription }}" data-datepicker-color="primary">
                        </div>
                        <div class="form-group">
                            <label for="metaKeywords">Meta Keywords:</label>
                            <input type="text" class="form-control" name="metaKeywords"
                                value="{{ $user->metaKeywords }}" data-datepicker-color="primary">
                                <small id="metaKeywords" class="form-text text-muted">Separate each word with a comma ,</small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submituser">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
