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
          type="hidden"
          value=0
          name="created_by">
      <input
        type="text"
        value="{{old('name')}}"
        class="form-control {{$errors->first('name') ? "is-invalid" :""}}"
        name="name"/>
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
      <br>
      <label for="">upload foto</label> <br>
      <input
        type="file"
        class="form-control {{$errors->first('image') ? "is-invalid" :""}}"
        name="image"/>
        <div class="invalid-feedback">
          {{$errors->first('image')}}
        </div>
      <br>
      <input
       type="submit"
       class="btn btn-primary"
       value="Save"/>

  </form>
</div>

@endsection
