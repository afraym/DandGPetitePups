    @session('success')
    <div class="alert alert-success">
      <button type="button" aria-hidden="true" class="close">
          <i class="now-ui-icons ui-1_simple-remove"></i>
      </button>
      <span><b> Success! - </b> {!! session('success') !!}</span>
  </div>
    @endsession
    @session('error')
    <div class="alert alert-danger">
      <button type="button" aria-hidden="true" class="close">
          <i class="now-ui-icons ui-1_simple-remove"></i>
      </button>
      <span><b> Error! - </b> {{ session('error') }}</span>
  </div>
    @endsession

    @error('name')
    <div class="alert alert-danger">
      <button type="button" aria-hidden="true" class="close">
          <i class="now-ui-icons ui-1_simple-remove"></i>
      </button>
      <span><b> Error ! - </b> {{ $message }}</span>
    </div>
@enderror

    <div class="alert alert-success" style="display: none;" id="success">
        
      </div>