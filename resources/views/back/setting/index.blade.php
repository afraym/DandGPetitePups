@extends('layouts.back')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Website Settings</h4>
        </div>
        <div class="card-body">
          @include('back.inc.alerts')
          <form method="POST" action="/admin/settings/update" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="APP_NAME">Website Name</label>
                <input type="text" class="form-control" id="APP_NAME" name="APP_NAME" placeholder="D&G Pertite Pups" value="{{ env('APP_NAME')}}">
              </div>
            <div class="form-group">
              <label for="description">Website Description</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="tel" name="phone" class="form-control" id="" placeholder="+19736527758">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" placeholder="info@dandgpetitepups.com">
            </div>
            <div class="form-group">
              <label for="">Facebook</label>
              <input type="text" name="facebook" class="form-control" id="" placeholder="https://www.facebook.com/dandgpetitepups">
            </div>
            <div class="form-group">
              <label for="">Instagram</label>
              <input type="text" name="instagram" class="form-control" id="" placeholder="https://www.instagram.com/dandgpups/">
            </div>
            <div class="form-group">
              <label for="">Twitter (X.com)</label>
              <input type="text" name="twitter" class="form-control" id="" placeholder="https://x.com/dandgpups/">
            </div>
            <div class="form-group">
              <label for="">Youtube</label>
              <input type="text" name="youtube" class="form-control" id="" placeholder="https://www.youtube.com/dandgpups/">
            </div>
            <div class="form-group">
              <label for="">TikTok</label>
              <input type="text" name="tiktok" class="form-control" id="" placeholder="https://www.tiktok.com/@dandgpups/">
            </div>
            <div class="form-group">
              <label for="headercode">Header Code</label>
              <textarea type="text" cols="30" rows="10" name="headercode" class="form-control" id="" placeholder="<script>G</script>"></textarea>
              <small id="headercode" class="form-text text-muted">You can use this to add any code you want e.g Google Analytics code</small>
            </div>
            <div class="form-group">
              <label for="footercode">Footer Code</label>
              <textarea type="text" cols="30" rows="10" name="footercode" class="form-control" id="" placeholder="<script>G</script>"></textarea>
              <small id="footercode" class="form-text text-muted">You can use this to add any code you want e.g Google Analytics code</small>
            </div>

            
            <div class="form-group">
              <label for="geminiapi">Gemini API</label>
              <input type="text" name="Gemini_API" class="form-control" id="" placeholder="AIzaSyAj6aOdluCbK0IoSU0pd9nvDUC7r3TSuT4" value="{{ env('Gemini_API') }}">
              <small id="geminiapi" class="form-text text-muted">For AI functions, You can get this from <a href="https://aistudio.google.com/app/apikey" target="_blank" rel="noopener noreferrer">Here</a></small>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="RECAPTCHAV3_SITEKEY">ReCAPTCHA V3 SITEKEY</label>
              <input type="text" name="RECAPTCHAV3_SITEKEY" class="form-control" id="" placeholder="AIzaSyAj6aOdluCbK0IoSU0pd9nvDUC7r3TSuT4" value="{{ env('RECAPTCHAV3_SITEKEY') }}">
              <small id="geminiapi" class="form-text text-muted">to protect your website from bots, You can get this from <a href="https://www.google.com/recaptcha/admin/create" target="_blank" rel="noopener noreferrer">Here</a></small>
            </div>
            <div class="form-group col-md-6">
              <label for="RECAPTCHAV3_SECRET">ReCAPTCHA V3 SECRET</label>
              <input type="text" name="RECAPTCHAV3_SECRET" class="form-control" id="" placeholder="AIzaSyAj6aOdluCbK0IoSU0pd9nvDUC7r3TSuT4" value="{{ env('RECAPTCHAV3_SECRET') }}">
            </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="GOOGLE_CLIENT_ID">GOOGLE CLIENT ID</label>
                <input type="text" name="GOOGLE_CLIENT_ID" class="form-control" id="" placeholder="AIzaSyAj6aOdluCbK0IoSU0pd9nvDUC7r3TSuT4" value="{{ env('GOOGLE_CLIENT_ID') }}">
                <small id="GOOGLE_CLIENT_ID" class="form-text text-muted">For Social Login, You can get this from <a href="https://developers.google.com/identity/oauth2/web/guides/get-google-api-clientid" target="_blank" rel="noopener noreferrer">Here</a></small>
              </div>
              <div class="form-group col-md-6">
                <label for="GOOGLE_CLIENT_SECRET">GOOGLE CLIENT SECRET</label>
                <input type="text" name="GOOGLE_CLIENT_SECRET" class="form-control" id="" placeholder="AIzaSyAj6aOdluCbK0IoSU0pd9nvDUC7r3TSuT4" value="{{ env('GOOGLE_CLIENT_SECRET') }}">
              </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="FACEBOOK_CLIENT_ID">FACEBOOK CLIENT ID</label>
                  <input type="text" name="FACEBOOK_CLIENT_ID" class="form-control" id="" placeholder="AIzaSyAj6aOdluCbK0IoSU0pd9nvDUC7r3TSuT4" value="{{ env('FACEBOOK_CLIENT_ID') }}">
                  <small id="FACEBOOK_CLIENT_ID" class="form-text text-muted">For Social Login, You can get this from <a href="https://developers.facebook.com/apps" target="_blank" rel="noopener noreferrer">Here</a></small>
                </div>
                <div class="form-group col-md-6">
                  <label for="FACEBOOK_CLIENT_SECRET">FACEBOOK CLIENT SECRET</label>
                  <input type="text" name="FACEBOOK_CLIENT_SECRET" class="form-control" id="" placeholder="AIzaSyAj6aOdluCbK0IoSU0pd9nvDUC7r3TSuT4" value="{{ env('FACEBOOK_CLIENT_SECRET') }}">
                </div>
                </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- The Delete Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        This will delete this Breed from database and it's photo
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="{{ Route('admin.user.delete') }}" method="post">
          @csrf
          <input type="hidden" value="" id='deleteitem' name="id">
        <button type="submit" class="btn btn-danger" >Yes, Delete</button>
      </form>
      </div>

    </div>
  </div>
</div>

@endsection