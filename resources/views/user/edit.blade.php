@extends('layouts.global')

@section('title') Edit User @endsection

@section('content')

<div class="col-md-8">
  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif
  <form class="bg-white shadow-sm p-3"
  enctype="multipart/form-data" action="{{route('users.update',$user->id)}}" method="post">
      @csrf
       {{-- Untuk menggunakan method selain GET dan POST, maka kita harus memberikan nilai method pada form
         sebagai POST, --}}
      <input type="hidden" name="_method" value="PUT">
      <label for="name">Name</label>
     <input
         value="{{old('name') ? old('name') : $user->name}}"
         class="form-control  {{$errors->first('name') ? "is-invalid" : ""}}"
         placeholder="Full Name"
         type="text"
         name="name"
         id="name"/>
         <div class="invalid-feedback">
         {{$errors->first('name')}}
         </div>
     <br>

     <br>
     <label for="">Status</label>
   <br/>
   <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control" id="active" name="status"> <label for="active">Active</label>
   <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status"> <label for="inactive">Inactive</label>
   <br><br>
     <br><br>

     <label for="">Roles</label>
     <br>
     <input
         type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}}
         name="roles[]"
         id="ADMIN"
         class="form-control {{$errors->first('roles') ? "is-invalid" :""}}"
         value="ADMIN">
     <label for="ADMIN">Administrator</label>
     <input
         type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ?
        "checked" : ""}}
         name="roles[]"
         id="STAFF"
         class="form-control {{$errors->first('roles') ? "is-invalid" :""}}"
         value="STAFF">
     <label for="STAFF">Staff</label>
     <input
         type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles))
        ? "checked" : ""}}
         name="roles[]"
         id="CUSTOMER"
         class="form-control {{$errors->first('roles') ? "is-valid" :""}}"
         value="CUSTOMER">
     <label for="CUSTOMER">Customer</label>
     <div class="invalid-feedback">
       {{$errors->first('roles')}}
     </div>
     <br><br>
     <label for="phone">Phone number</label>
     <br>
     <input
       type="text"
       name="phone"
       class="form-control  {{$errors->first('phone') ? "is-invalid" : ""}}"
       value="{{old('phone') ? old('phone'): $user->phone}}">
       <div class="invalid-feedback">
         {{$errors->first('phone')}}
       </div>
     <br>
     <label for="address">Address</label>
     <textarea
       name="address"
       id="address"
       class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">
       {{old('address') ?old('address') : $user->address}}
     </textarea>
     <div class="invalid-feedback">
     {{$errors->first('address')}}
     </div>

     <br>
     <label for="avatar">Avatar image</label>
     <br>
     Current avatar: <br>
     @if($user->avatar)
     <?php
     $urlAsli = $user->avatar;
     $remove = str_replace('C:\xampp\htdocs\olsop\public\images\\', '', $urlAsli);
      ?>
     <img src="/images/{{$remove}}" width="120px" />
     <br>
     @else
     No avatar
     @endif
     <br>
     <input
         id="avatar"
         name="avatar"
         type="file"
         class="form-control">
     <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
     <hr class="my-3">

     <label for="email">Email</label>
     <input
         value="{{$user->email}}"
         disabled
         class="form-control {{$errors->first('email') ? "is-invalid" : ""}}"
         placeholder="user@mail.com"
         type="text"
         name="email"
         id="email"/>
         <div class="invalid-feedback">
         {{$errors->first('email')}}
         </div>
         <br>

       <input
         class="btn btn-primary"
         type="submit"
         value="Save"/>
  </form>
</div>
@endsection
