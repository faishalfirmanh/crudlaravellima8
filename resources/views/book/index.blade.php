@extends('layouts.global')
@section('title')List books @endsection
@section('content')

<div class="row">
<div class="col-md-6">
  <div class="col-md-6">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="{{Request::get('status') == NULL && Request::path() == 'book' ? 'active' : ''}} nav-link"
        href="{{route('book.index')}}">All</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::get('status') == 'publish' ? 'active' : '' }}
        " href="{{route('book.index',['status'=>'publish'])}}">publis</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::get('status') == 'draft' ? 'active' : '' }}"
        href="{{route('book.index',['status'=>'draft'])}}">draft</a>
      </li>
    </ul>
  </div>
</div>

  <div class="col-md-12 text-right">
    <a href="{{route('book.create')}}"class="btn btn-primary">Create book</a>
  </div>
  <br><br>

  <div class="col-md-12">
    <div class="col-md-6">
      <form action="{{route('book.index')}}">
        <div class="input-group">
          <input type="text"
                 placeholder="input title"
                 class="form-control"
                 name="keyword" value="{{Request::get('keyword')}}">
          <div class="input-group-append">
            <input type="submit" class="btn btn-primary" value="filter">
          </div>
        </div>
      </form>
    </div>
    <br><br>
    <table class="table table-bordered table-stripped">
      <thead>
        <tr>
          <th>
            <b>Cover</b>
          </th>
          <th>
            <b>Title</b>
          </th>
          <th>
            <b>Author</b>
          </th>
          <th>
            <b>Status</b>
          </th>
          <th>
            <b>Categorie</b>
          </th>
          <th>
            <b>Stock</b>
          </th>
          <th>
            <b>Price</b>
          </th>
          <th>
            <b>Actions</b>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($pek as $mek)
        <tr>
          <td>
            @if($mek->cover)
            <img src="/storage/{{$mek->cover}}" width="48px" >
            @else
              no image
            @endif
          </td>
          <td>{{$mek->title}}</td>
          <td>{{$mek->author}}</td>
          <td>
             @if($mek->status == "DRAFT")
             <span class="badge bg-dark text-white">{{$mek->status}}</span>
             @else
             <span class="badge badge-success">{{$mek->status}}
            </span>
             @endif
          </td>
          <td>
            <ul class="pl-3">
              @foreach($mek->category as $kat)
              <li>
                {{$kat->name}}
              </li>
              @endforeach
            </ul>
          </td>
          <td>{{$mek->stock}}</td>
          <td>{{$mek->price}}</td>
          <td>
              <a href="{{route('book.edit',['id'=>$mek->id])}}"class="btn btn-info text-white btn-sm">Edit</a>
              <form
               onsubmit="return confirm('Delete this book permanently?')"
               class="d-inline"
               action="{{route('book.destroy',['id'=>$mek->id])}}"
               method="POST"
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
      <!-- <tfoot>
        <tr>
          <td>

          </td>
        </tr>
      </tfoot> -->
    </table>
      {{$pek->links() }}
  </div>
</div>


@endsection
