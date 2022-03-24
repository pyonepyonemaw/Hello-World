@extends('layouts.master')

@section('title','Edit Post')

@section('content')
<div class="container">
<form class="col-md-6 offset-3 mt-5" method="post" action='{{ url("posts/$post->id") }}'>
   @if(Session::has('status'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ Session::get('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
   @endif
    
    <h2>Edit Post</h2>
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
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="{{ $post->title }}">
  </div>
  <div class="mb-3 mt-3">
    <label for="des" class="form-label">Description</label>
    <textarea name="des" id="des" class="form-control">{{ $post->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-outline-primary">Update</button>
</form>
</div>
@endsection