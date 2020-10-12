@extends('layouts.global')
@section('title') Detail User @endsection

@section('content')
<div class="col-md-8">
  <div class="card">
    <div class="card-body">
      NAMA :{{$pek->name}}
      <br><br>
      @if($pek->avatar)
      <?php
      $urlAsli = $pek->avatar;
      $remove = str_replace('C:\xampp\htdocs\olsop\public\images\\', '', $urlAsli);
       ?>
       <img src="/images/{{$remove}}" style="width: 100px; height: 70px" />
      @else
        Tidak ada gambar
      @endif

      <br>
       <br>
       <b>Username:</b><br>
       {{$pek->email}}
       <br>
       <br>
       <b>Phone number</b> <br>
       {{$pek->phone}}
       <br><br>
       <b>Address</b> <br>
       {{$pek->address}}

       <br>
       <br>
       <b>Roles:</b> <br>
       @foreach (json_decode($pek->roles) as $role)
       &middot; {{$role}} <br>
       @endforeach

    </div>

  </div>

</div>

@endsection
