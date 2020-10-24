<div class="flash-message">
  @foreach (['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light'] as $msg)
    @if(Session::has($msg))
      <div class="alert alert-{{ $msg }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div>{{ Session::get($msg) }}</div>
      </div>
    @endif
  @endforeach
</div>

<div class="row">
  <div class="col-12">
@if($errors->any())
  {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
  </div>
</div>