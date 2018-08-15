@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="columns is- is-marginless is-centered">
      <div class="column is-7">

        <div class="card">

          <header class="card-header">
            <p class="card-header-title">
              Registration Confirmed
            </p>
          </header>

          <div class="card-content">
            <div class="content">
              <p>Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a></p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

@endsection
