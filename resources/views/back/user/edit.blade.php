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
                            <a href="/{{ $user->image }}" target="_blank" rel="noopener noreferrer">
                                <img src="/{{ $user->image }}" alt="{{ $user->name}}" class="img-thumbnail" style="width: 35%; height:20%">
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
                            <label for="role">User Role:</label>
                            <select name="role" id="role" class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="super-admin">Super Admin</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" id="submituser">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
