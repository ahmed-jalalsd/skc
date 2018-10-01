@if (Session::has('success'))
  <div class="notification is-success" role="alert">
    <button class="delete"></button>
    <strong>Success</strong>, {{ Session::get('success')}}
  </div>
@endif

@if (Session::has('update'))
  <div class="notification is-info" role="alert">
    <button class="delete"></button>
    <strong>Success</strong>, {{ Session::get('update')}}
  </div>
@endif

@if (Session::has('danger'))
  <div class="notification is-danger" role="alert">
    <button class="delete"></button>
    <strong>Success</strong>, {{ Session::get('danger')}}
  </div>
@endif

@if (count($errors) > 0)
  <div class="notification is-warning" role="alert">
    <button class="delete"></button>
    <strong>Errors:</strong>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
