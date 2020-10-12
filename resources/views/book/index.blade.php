@extends('layouts.global')
@section('title')List books @endsection
@section('content')

<div class="row">
  <div class="col-md-12 text-right">
    <a href="{{route('book.create')}}"class="btn btn-primary">Create book</a>
  </div>
  <br><br>
  <div class="col-md-12">
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

          </td>
          <td>{{$mek->stock}}</td>
          <td>{{$mek->price}}</td>
          <td>
            Actions
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td>

          </td>
        </tr>
      </tfoot>
    </table>
  </div>

</div>
@endsection
