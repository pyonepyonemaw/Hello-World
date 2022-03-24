@extends('layouts.master')

@section('title','Post List')

@section('content')
<div class="container mt-5">
  @if(Session::has('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ Session::get('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  @endif
<table class="table mt-5">
  <thead class="table-dark">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
      @php $no=1 @endphp
      @foreach($posts as $post)
    <tr>
    <td>{{ $no }}</td>
    <td>{{$post->title}}</td>
    <td>{{ $post->description}}</td>
    <td><a href='{{ url("posts/$post->id") }}'>Edit</a>
    <a href='{{ url("post/$post->id/delete") }}'>Delete</a></td>
    </tr>
    @php $no++ @endphp
    @endforeach
  </tbody>
</table>
</div>

@endsection