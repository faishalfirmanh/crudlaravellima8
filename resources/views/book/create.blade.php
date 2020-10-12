@extends('layouts.global')
@section('footer-scripts')
<link type="text/css" href="{{ asset('select2.min.css') }}" rel="stylesheet" />
<script src="{{asset('select2.min.js')}}"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
rc.0/js/select2.min.js"></script>

@endsection
<script>
$('.category').select2({
  ajax:{
    url:'http://127.0.0.1:8000/ajax/category/search',
    dataType:'json',
    processResults:function(data){
      return{
        result:data.map(function(item){
          return{
            id:item.id,
            text:item.name
          }
        })
      }
    }
  }
});
</script>
@section('title')
Create Book
@endsection

@section('content')
<!-- <div class="row">
      @if(session('status'))
         <div class="alert alert-success">
         {{session('status')}}
         </div>
      @endif
  <div class="col-md-12">
    <form
      class="shadow-lg p-3 bg-white"
      enctype="multipart/form-data"
      action="{{route('book.store')}}"
      method="POST">
      @csrf
      <label for="title">Judul</label>
      <input type="text" name="title" class="form-control" placeholder="judul buku">
      <br>
      <label for="cover">cover</label>
      <input type="file" name="cover" class="form-control">
      <br>
      <label for="description">Deskripsi</label>
      <textarea type="text" name="description" id="description" class="form-control" placeholder="deskripsi buku">
      </textarea>
      <br>
      <label for="stock">Stok</label>
      <input type="number" min="0" max="0" name="stock" id="stock" class="form-control" placeholder="stok buku">
      <br>
      <label for="author">penulis</label>
      <input type="text" name="author" id="author" class="form-control" placeholder="penulis">
      <br>
      <label for="publisher">publisher</label>
      <input type="text" name="publisher" id="publisher" class="form-control" placeholder="penerbit">
      <br>
      <label for="price">harga</label>
      <input type="number" id="price" name="price" class="form-control" placeholder="harga buku">
      <br>
      <button
        type="button"
        class="btn btn-primary"
        name="save_action"
        value="PUBLISH">
        Publish
      </button>
      <button
        type="button"
        class="btn btn-secondary"
        name="save_action"
        value="DRAFT">
        Save As Draft
      </button>
    </form>
  </div>
</div> -->

<div class="row">
 <div class="col-md-8">
   @if(session('status'))
      <div class="alert alert-success">
      {{session('status')}}
      </div>
   @endif
     <form
         action="{{route('book.store')}}"
         method="POST"
         enctype="multipart/form-data"
         class="shadow-sm p-3 bg-white"
         >
       @csrf
       <label for="title">Title</label> <br>
       <input type="text" class="form-control" name="title"
      placeholder="Book title">
       <br>
       <label for="cover">Cover</label>
       <input type="file" class="form-control" name="cover">
       <br>
       <label for="description">Description</label><br>
       <textarea name="description" id="description" class="formcontrol" placeholder="Give a description about this book"></textarea>
       <br>
       <label for="category">Categories</label><br>
      <select
        name="category[]"
        multiple
        id="category"

        class="form-control">
      </select>
      <br><br/>
       <label for="stock">Stock</label><br>
       <input type="number" class="form-control" id="stock" name="stock"
      min=0 value=0>
       <br>
       <label for="author">Author</label><br>
       <input type="text" class="form-control" name="author" id="author"
      placeholder="Book author">
       <br>
       <label for="publisher">Publisher</label> <br>
       <input type="text" class="form-control" id="publisher"
      name="publisher" placeholder="Book publisher">
       <br>
       <label for="Price">Price</label> <br>
       <input type="number" class="form-control" name="price" id="price"
      placeholder="Book price">
       <br>
       <button
       class="btn btn-primary"
       name="save_action"
       value="PUBLISH">Publish</button>
       <button
       class="btn btn-secondary"
       name="save_action"
       value="DRAFT">Save as draft</button>
       </form>
       </div>
       </div>
@endsection
