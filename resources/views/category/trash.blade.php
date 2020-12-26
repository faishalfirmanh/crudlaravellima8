@extends('layouts.global')
@section('title') Trashed Categories @endsection
@section('content')
  <div class="row">
    <div class="col-md-6">
      <!-- <form action="{{route('category.cari')}}">
        <div class="input-group">
          <input
            type="text"
            class="form-control"
            value="{{Request::get('name')}}">
        </div>
        <div class="input-group">
          <input
            type="submit"
            value="filter"
            class="btn btn-primary">
        </div>
      </form> -->
        <br><br>
    </div>
  <div class="col-md-6">
    <!-- <ul class="nav nav-pills card-header-pills">
      <li>
        <a href="{{route('category.index')}}">Publih</a>
      </li>
      <li>
        <a href="{{route('category.trash')}}">Trash</a>
      </li>
    </ul> -->
  </div>

  <hr class="my-3">
  <div class="col-md-12">
    <div class="col-md-12">
      <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Slug</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($category as $trasKat)
          <tr>
            <td>{{$trasKat->name}}</td>
            <td>{{$trasKat->slug}}</td>
            <td>
              @if($trasKat->image)
              <img src="/storage/{{$trasKat->image}}" width="48px">
              @endif
            </td>
            <td>
              <a
              class="btn btn-success"
              href="{{route('category.restore',['id'=>$trasKat->id])}}">
                Restore
              </a>
              <form
                 class="d-inline"
                 action="{{route('category.deletePermanent', ['id' => $trasKat->id])}}"
                 method="POST"
                 onsubmit="return confirm('yakin hapus permanent?')"
                 >
                 @csrf
                 <input
                   type="hidden"
                   name="_method"
                   value="DELETE"/>
                 <input
                   type="submit"
                   class="btn btn-danger btn-sm"
                   value="Delete"/>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="10">

            </td>
          </tr>
        </tfoot>
      </table>
      {{$category->links()}}
    </div>
  </div>
</div>





@endsection
