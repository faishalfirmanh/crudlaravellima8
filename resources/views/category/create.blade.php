@extends('layouts.global')
@section('title') Crate Category @endsection

@section('content')
<div class="col-md-8">
    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif
  <form
      class="bg-white shadow-sm p-3"
      enctype="multipart/form-data"
      action="{{route('category.store')}}"
      method="POST">
      @csrf
      <label for="">Nama Kategory</label> <br>
      <input
        type="text"
        class="form-control"
        name="name"/>
      <br>
      <label for="">upload foto</label> <br>
      <input
        type="file"
        class="form-control"
        name="image"/>
      <br>
      <input
       type="submit"
       class="btn btn-primary"
       value="Save"/>

  </form>
</div>

@endsection
