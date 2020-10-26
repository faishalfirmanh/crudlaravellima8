@extends("layouts.global")
@section("title") Users list @endsection
<?php
/**
 *
 */
class Orang
{
  public $name="BOKER";
  public $age;
  public $city;
  function __construct()
  {
    // code...
  }
  public function name($arg){
    $this->name = $arg;
  }
  public function age($arg){
    $this->age = $arg;
  }
  public function city($ag){
    $this->city= $ag;
  }
  public function getnya(){
    return $this->name;
  }
}
$myObj = new Orang();
// $myObj->name = "John";
$cetak = $myObj->getnya();

$myJSON = json_encode($myObj->name);
// echo $myJSON;
 ?>
@section("content")
<div class="" style="margin-top:-55px;margin-left:-20px;">
  <div class="col-md-12 text-right">
    <a
      href="{{route('users.create')}}"class="btn btn-primary">Create user</a>
  </div>
</div>

 <br>
 <div class="" style="margin-left:-75px;margin-bottom:20px;">
   <div class="">
     <form class="{{route('users.index')}}">
       <input class="form-control" style="width:250px;" name="keyword" value="{{Request::get('keyword')}}" type="text" placeholder="email">
       <div class="">
         <input
         {{Request::get('status')=='ACTIVE' ? 'checked' : ''}}
          type="radio"
          name="status"
          id="active"
          value="ACTIVE"
          class="form-control">
          <label for="active">Active</label>
          <input
          {{Request::get('status')=='INactive' ? 'checked' : ''}}
           type="radio"
           name="status"
           id="inactive"
           value="INACTIVE"
           class="form-control">
           <label for="inactive">INACTIVE</label>
       </div>
         <div class="input-groub-append">
           <input
           style="margin-top:10px;"
           type="submit"
           class="btn btn-primary"
           value="filter">
         </div>
     </form>
   </div>
 </div>

<br>
@if(session('status'))
<div class="alert alert-success">
{{session('status')}}
</div>
@endif
<table class="table table-bordered">
 <thead>
 <tr>
 <th><b>Name</b></th>
 <th><b>Username</b></th>
 <th><b>Email</b></th>
 <th><b>Avatar</b></th>
 <th><b>Status<b></th>
 <th><b>Action</b></th>
 </tr>
 </thead>
 <tbody>
 @foreach($users as $user)
 <tr>
 <td>{{$user->name}}</td>
 <td>{{$user->username}}</td>
 <td>{{$user->email}}</td>
 <td>
 @if($user->avatar)
 <?php
 $urlAsli = $user->avatar;
 $remove = str_replace('C:\xampp\htdocs\olsop\public\images\\', '', $urlAsli);
  ?>
  <img src="/images/{{$remove}}" style="width: 100px; height: 70px" />
 @else
 N/A
 @endif
 </td>
 <td>
   @if($user->status =="ACTIVE")
   <span class="badge badge-success">
     {{$user->status}}
     @else
     <span class="badge badge-danger">
     {{$user->status}}
     </span>
     @endif
   </span>
 </td>
 <td>
   <a class="btn btn-info text-white btn-sm" href="{{route('users.edit',['id'=>$user->id])}}">Edit</a>
   {{-- routenya dibaca /user/{id}/edit ,id diperoleh dari ['id'..] --}}
   <form
     onsubmit="return confirm('Yakin hapus permanent ?')"
     class="d-inline"
     action="{{route('users.destroy', ['id' => $user->id ])}}"
     method="post">
    @csrf
        <input
          type="hidden"
          name="_method"
          value="DELETE">
        <input
          type="submit"
          value="Delete"
          class="btn btn-danger btn-sm">
   </form>
   <a href="{{route('users.show',['id'=>$user->id])}}" class="btn btn-primary btn-sm">details</a>
 </td>
 </tr>
 @endforeach
 </tbody>
</table>
{{ $users->links() }}

@endsection
