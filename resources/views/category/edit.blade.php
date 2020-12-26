@extends('layouts.global')
@section('title') edit Kategori @endsection

@section('content')
ini edit
<div class="col-md-8">
  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif
  <form
    action="{{route('category.update', ['id' => $cat->id])}}"
    enctype="multipart/form-data"
    method="POST"
    class="bg-white shadow-sm p-3"
    >
    @csrf
    <input
        type="hidden"
        value="PUT"
        name="_method">
      <label for="">Nama Kategori</label><br>
      <input
        class="form-control {{$errors->first('name') ? "is-invalid":""}}"
        type="text"
        name="name"
        value="{{old('name') ? old('name') :$cat->name}}">
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
        <br><br>
      <label for="">Kategori Slug</label><br>
      <input
        type="text"
        disabled
        class="form-control {{$errors->first('slug') ? "is-invalid":""}}"
        name="slug"
        value="{{old('slug') ? old('slug') : $cat->slug}}">
        <div class="invalid-feedback">
          {{$errors->first('slug')}}
        </div>
        <br><br>
      <label for="">Foto</label><br>
      @if($cat->image)
        <img name="image" src="/storage/{{$cat->image}}" width="120px">
        <br><br>
      <input
        type="file"
        class="form-control"
        name="image"
        >
        <!-- <div class="invalid-feedback">
          {{$errors->first('image')}}
        </div> -->
        <br><br>
      @endif

    <input type="submit" class="btn btn-primary" value="Update">
    </form>

</div>
@endsection
