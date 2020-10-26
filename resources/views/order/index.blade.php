@extends('layouts.global')
@section('title')order list @endsection
@section('content')
<div class="col-md-12">
  <form action="{{route('order.index')}}">
      <div class="row">
        <div class="col-md-8">
          <input placeholder="masukkan email" type="text" class="form-control" name="buyer_email" value="{{Request::get('buyer_email')}}">
        </div><br><br>
        <div class="col-md-5">
          <select class="form-control" name="status" id="status">
            <option value="">ANY</option>
            <option {{Request::get('status')=="SUBMIT" ? "selected" :""}} value="SUBMIT">SUBMIT</option>
            <option {{Request::get('status')=="PROCESS" ? "selected" :""}} value="PROCESS">PROCESS</option>
            <option {{Request::get('status')=="FINISH" ? "selected" :""}} value="FINISH">FINISH</option>
            <option {{Request::get('status')=="CANCEL" ? "selected" :""}} value="CANCEL">CANCEL</option>
          </select>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="filter">
        </div>
      </div>
  </form>
</div><br><br>
<hr class="my-3">
<div class="">
  <div class="col-md-12"><br><br>
    <table class="table table-stripped table-bordered">
      <thead>
        <tr>
          <th>Invoice number</th>
          <th>Status</th>
          <th>Buyer</th>
          <th>Total quantiy</th>
          <th>Order date</th>
          <th>Total price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order as $mek)
        <tr>
          <td>{{$mek->invoice_number}}</td>
          <td>
            @if($mek->status == "SUBMIT")
            <span class="badge bg-warning text-light">{{$mek->status}}</span>
           @elseif($mek->status == "PROCESS")
           <span class="badge bg-info text-light">{{$mek->status}}</span>
           @elseif($mek->status == "FINISH")
           <span class="badge bg-success text-light">{{$mek->status}}</span>
           @elseif($mek->status == "CANCEL")
           <span class="badge bg-dark text-light">{{$mek->status}}</span>
           @endif
          </td>
          <td>
            {{$mek->user->name}} <br>
            <small>{{$mek->user->email}}</small>
          </td>
          <td>
            {{$mek->totalQuantity}}
          </td>
          <td>
            {{$mek->created_at}}
          </td>
          <td>
            <?php $harg =$mek->total_price;
            $tostr =strval($harg); //to str
            $sum = strlen($tostr); //sum character
            $jum = $sum-3;
            // $ar = explode(" ",$tostr);
            $arSplt = str_split($tostr);
            $inserted =".";
            // echo "$sum";
            $addCharInAr = array_splice( $arSplt, $jum, 0, $inserted );//manipulasi array
            $artoStr = implode("",$arSplt);//arr to str
             // print_r($arSplt);

            // echo "$jum";

             ?>
             Rp.{{$artoStr}}
          </td>
          <td>
              <a href="{{route('order.edit',['id'=>$mek->id])}}" class="btn btn-info btn-sm">Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tr>
        <td>

        </td>
      </tr>
    </table>
  </div>

</div>

@endsection
