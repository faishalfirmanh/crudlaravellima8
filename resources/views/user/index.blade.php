@extends("layouts.global")
@section("title") Users list @endsection
@section("content")
 <br>
 <div class="">
   <div class="">
     <form class="{{route('users.index')}}">
       <input class="form-control form-control-lg" name="keyword" value="{{Request::get('keyword')}}" type="text" placeholder="email">
       <div class="col-md-6">
        
       </div>
         <div class="input-groub-append">
           <input
           type="submit"
           class="btn btn-primary"
           value="filter">
         </div>
     </form>
   </div>
 </div>
<div class="row">
  <div class="col-md-12 text-right">
    <a href="{{route('users.create')}}"class="btn btn-primary">Create user</a>
  </div>
</div>
<br>
<table class="table table-bordered">

 <thead>
    @if(session('status'))
    <div class="alert alert-success">
    {{session('status')}}
    </div>
    @endif

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
   <form
     onsubmit="return confirm('Delete this user permanently?')"
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
