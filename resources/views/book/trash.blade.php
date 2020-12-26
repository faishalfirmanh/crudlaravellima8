@extends('layouts.global')

@section('title') Halamn trash @endsection
@section('content')
<br><br>
<div class="" style="margin-top:80px;">
  <div class="col-md-12">
    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif
  </div>
  <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th><b>Cover</b></th>
            <th><b>Title</b></th>
            <th><b>Author</b></th>
            <th><b>Categories</b></th>
            <th><b>Stock</b></th>
            <th><b>Price</b></th>
            <th><b>Action</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($bok as $book)
            <tr>
              <td>
                @if($book->cover)
                <img src="/storage/{{$book->cover}}" width="48px" >
                @else
                  no image
                @endif

              </td>
              <td>{{$book->title}}</td>
              <td>{{$book->author}}</td>
              <td>
                <ul class="pl-3">
                @foreach($book->category as $category)
                  <li>{{$category->name}}</li>
                @endforeach
                </ul>
              </td>
              <td>{{$book->stock}}</td>
              <td>{{$book->price}}</td>
              <td>
                  <a
                  class="btn btn-success"
                  href="{{route('book.restore',['id'=>$book->id])}}">
                    Restore
                  </a>

                  <form
                     class="d-inline"
                     action="{{route('book.deletePermanent', ['id' => $book->id])}}"
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
                {{$bok->links()}}
            </td>
          </tr>
        </tfoot>
      </table>

</div>

@endsection
