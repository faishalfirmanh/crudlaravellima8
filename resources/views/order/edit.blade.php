@extends('layouts.global')
@section('title')edit  @endsection
@section('content')


<div class="row">
  <div class="col-md-12">
    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif
    <form class="shadow-sm bg-white p-3" action="{{route('order.update',['id'=>$pesan->id])}}" method="post">
      @csrf
      <input type="hidden" name="_method" value="PUT">
       <label for="invoice_number">Invoice number</label><br>
       <input
          type="text"
          class="form-control"
          value="{{$pesan->invoice_number}}" disabled>
       <br>
       <label for="">Buyer</label><br>
       <input disabled class="form-control" type="text" value="{{$pesan->user->name}}"><br>
       <label for="">Books ({{$pesan->totalQuantity}}) </label><br>
       <ul>
       @foreach($pesan->book as $boo)
       <li>{{$boo->title}} <b>({{$boo->pivot->quantity}})</b></li>
       @endforeach
       </ul>
       <label for="">Total price</label><br>
       <input class="form-control" type="text" value="{{$pesan->total_price}}" disabled>
       <label for="status">Status</label><br>
         <select class="form-control" name="status" id="status">
         <option {{$pesan->status == "SUBMIT" ? "selected" : ""}}value="SUBMIT">SUBMIT</option>
         <option {{$pesan->status == "PROCESS" ? "selected" : ""}}
        value="PROCESS">PROCESS</option>
         <option {{$pesan->status == "FINISH" ? "selected" : ""}}
        value="FINISH">FINISH</option>
         <option {{$pesan->status == "CANCEL" ? "selected" : ""}}
        value="CANCEL">CANCEL</option>
         </select>
         <br>
         <input type="submit" class="btn btn-primary" value="Update">
       <br>
    </form>
  </div>
</div>
@endsection
