@extends('layouts.global')
@section('title')detail @endsection
@section('content')
<div class="col-md-8">
  <div class="card">
    <div class="card-body">
      <label for="">
        <b>Category nama</b>
      </label>
      <br>
      {{$cat->name}}
      <br><br>
      <label for="">
        <b>Category Slug</b>
      </label>
      <br>
      {{$cat->slug}}
      <br><br>
      <label><b>Category image</b></label><br>
       @if($cat->image)
       <img src="{{asset('storage/' . $cat->image)}}" width="120px">
       @endif

    </div>
  </div>

</div>
@endsection
