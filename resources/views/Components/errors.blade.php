@if ($errors->any())
  <div class="content" id="sessionMsg" x-data="{ show: true }" x-show="show"
       x-init="setTimeout(() => show = false, 5000)">
    <div class="alert alert-danger alert-dismissable" role="alert">
      <h3 class="alert-heading font-size-h4 my-2">
        <i class="fa fa-fw fa-exclamation-triangle opacity-50 mr-1"></i>
        Error</h3>
      <ul>
        @foreach ($errors->all() as $error)
          <li> {{ $error }}</li>
        @endforeach
      </ul>

    </div>
  </div>
@endif
