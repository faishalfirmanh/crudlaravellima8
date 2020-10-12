@extends('layouts.global')

@section('title')List Kategori @endsection

@section('content')
<br>
<div class="row">
  <div class="col-md-6">
    <form class="" action="{{route('category.index')}}">
      <div class="input-group">
        <input
        type="text"
        name="name"
        class="form-control">
        <input
        type="submit"
        class="btn btn-primary"
        value="filter">
      </div>
    </form>
    <br><br>
  </div>
  <div class="row">
    <div class="col-md-12 text-right">
      <a href="{{route('category.create')}}"class="btn btn-primary">Create category</a>
    </div>
  </div>
  <div class="col-md-6">
    <ul class="nav nav-pills card-header-pills">
      <!-- <li class="nav-item">
        <a class="nav-link active" href="{{route('category.index')}}">Publisehd</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link active" href="{{route('category.trash')}}">
          Trash
        </a>
      </li>
    </ul>
  </div>
<!-- </div>
<div class="row"> -->
  <div class="col-md-12">
    @if(session('status'))
     <div class="row">
       <div class="col-md-12">
         <div class="alert alert-warning">
     {{session('status')}}
        </div>
      </div>
     </div>
    @endif

    <table class="table table-bordered table-stripped">
      <thead>
        <tr>
          <th>
            <b>Name</b>
          </th>
          <th>
            <b>Slug</b>
          </th>
          <th>
            <b>image</b>
          </th>
          <th>
            <b>Actions</b>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($moh as $kategoi)
        <tr>
          <td>{{$kategoi->name}}</td>
          <td>{{$kategoi->slug}}</td>
          <td>
            @if($kategoi->image== null)
              Tidak ada gambr brow
            @else

            <img src="/storage/{{$kategoi->image}}" width="48px" alt="">
            @endif
          </td>
          <td>
            <a class="btn btn-info text-white btn-sm"
              href="{{route('category.edit',['id'=>$kategoi->id])}}">
              Edit</a>
            <a
            class="btn btn-warning btn-sm"
            href="{{route('category.show',['id'=>$kategoi->id])}}">
              detail
            </a>
            <form
             class="d-inline"
             action="{{route('category.destroy', ['id' => $kategoi->id])}}"
             method="POST"
             onsubmit="return confirm('Move category to trash?')"
             >
             @csrf
             <input
               type="hidden"
               value="DELETE"
               name="_method">
             <input
               type="submit"
               class="btn btn-danger btn-sm"
               value="Trash">
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
