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
        type="text"
        name="name"
        value="{{$cat->name}}">
        <br><br>
      <label for="">Kategori Slug</label><br>
      <input
        type="text"
        name="slug"
        value="{{$cat->name}}">
        <br><br>
      <label for="">Foto</label><br>
      @if($cat->image)
        <span>gambar saat ini</span>
        <img name="image" src="/storage/{{$cat->image}}" width="120px">
        <br><br>

      <input
        type="file"
        class="form-control"
        name="image"
        >
        <br><br>
      @endif
    <input type="submit" class="btn btn-primary" value="Update">
    </form>

</div>
@endsection
