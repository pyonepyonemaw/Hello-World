@extends('layouts.master')

@section('title','User Add')

@section('content')
<div class="container">
<form class="col-md-6 offset-3 mt-5" method="post" action="{{ url('/register') }}">
   @if(Session::has('status'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ Session::get('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
   @endif
    
    <h2>Register</h2>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $error }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endforeach
    @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter user email">
  </div>
  <div class="mb-3 mt-3">
    <label for="password" class="form-label">Password</label>
    <input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
  </div>
  <button type="submit" class="btn btn-outline-primary">Register</button>
</form>
</div>
@endsection