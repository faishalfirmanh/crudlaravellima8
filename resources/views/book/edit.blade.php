@extends('layouts.global')
@section('title')Edit buku @endsection
@section('footer-scripts')
<link type="text/css" href="{{ asset('select2.min.css') }}" rel="stylesheet" />
<script src="{{asset('select2.min.js')}}"></script>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
<script type="text/javascript">
  $('#category').select2({
    ajax:{
      url:'http://127.0.0.1:8000/ajax/category/search',
      processResults:function(data){
        return{
          results:data.map(function(item){
            return{
              id:item.id,
              text:item.name
            }
          })
        }
      }
    }
  })

  let cat = {!! $buku->category !!}
    cat.forEach(function(item){
      const option = new Option(item.name, item.id, true, true);
      $('#category').append(option).trigger('change');
    });

</script>
@endsection
@section('content')

<div class="col-md-8">
  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif
  <form class="bg-white shadow-sm p-3"
        action="{{route('book.update',['id'=>$buku])}}"
        enctype="multipart/form-data"
        method="post">
        @csrf
        <input
            type="hidden"
            value="PUT"
            name="_method">
        <label for="">judul</label><br>
        <input
          type="text"
          name="title"
          value="{{$buku->title}}"><br><br>
        <label>Descripsi</label><br>
        <input
          type="text"
          name="description"
          value="{{$buku->description}}"><br><br>
        <label>Author</label><br>
        <input
          type="text"
          name="author"
          value="{{$buku->author}}"><br><br>
        <label for="">Foto</label><br>
        @if($buku->cover!=='')
          <img name="cover" src="/storage/{{$buku->cover}}" width="120px">
          <br><br>
        <input
          type="file"
          class="form-control"
          name="cover"
          >
          <br><br>
        @else
        <label style="background-color:red">foto sebelumnya tidak ada</label>
        <input
          type="file"
          class="form-control"
          name="cover"
          >
          <br><br>
        @endif
        <label for="">Category</label>
        <select multiple class="form-control" name="category[]" id="category">
        </select><br><br>
        <label for="">Status</label>
        <select class="" name="status" class="form-control">
          <option {{$buku->status =='PUBLISH' ? 'selected':''}} value="PUBLISH">PUBLIS</option>
          <option {{$buku->status =='DRAFT' ? 'selected':''}} value="DRAFT">DRAFT</option>
        </select>
        <br><br>

        <label>price</label><br>
        <input
          type="text"
          name="price"
          value="{{$buku->price}}"><br><br>

        <input type="submit" class="btn btn-primary" value="Update">
  </form>
</div>
@endsection
