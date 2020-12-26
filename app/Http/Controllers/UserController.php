<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware(function($request,$next){
          if (Gate::allows('manage-user')) return $next($request);
          abort(403,'Anda tidak memiliki hak akses');
        });

    }



    public function index(Request $req)
    {
        //
        $status = $req->get('status');
        $user = \App\User::paginate(10);
        $filter = $req->get('keyword');
        if ($filter) {
          if ($status) {
            $user = \App\User::where('email','LIKE', "%$filter%")
            ->where('status',$status) //kusus tambahan filter status
            ->paginate(5);
            $jumAr =json_encode($user[0]); //json dirubah ke str
            if ($jumAr=='null') {
              return('maaf data tidak ditemukan');
            }else {
              return view('user.index',['users'=>$user]);
            }
          }
        }
            return view('user.index',['users'=>$user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validation =\Validator::make($request->all(),[
          "name"=>"required|min:5|max:100",
          "username"=>"required|min:5|max:50",
          "roles"=>"required",
          "phone"=>"required|digits_between:10,12",
          "address"=>"required|min:20|max:200",
          "avatar"=>"required",
          "email"=>"required|email",
          "password"=>"required",
          "password_confirmation" => "required|same:password"
        ])->validate();
        $userbaru = new \App\User;
        $userbaru->name = $request->get('name');
        $userbaru->username = $request->get('username');
       $userbaru->roles = json_encode($request->get('roles'));
       $userbaru->address = $request->get('address');
       $userbaru->phone = $request->get('phone');
       $userbaru->email = $request->get('email');
       $userbaru->password = \Hash::make($request->get('password'));

       if ($request->file('avatar')) {
         $file = $request->file('avatar');
         $nama_file = time()."_".$file->getClientOriginalName();
         $fix = $request->file('avatar')->move(public_path('images'), $nama_file);
         $userbaru->avatar = $fix;
       }
       $userbaru->save();
       return redirect()->route('users.create')->with('status', 'User successfully created');//status merupkan sessing yang dikirm ke alert

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = \App\User::findOrFail($id);
        return view('user.detail', ['pek' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = \App\User::findOrFail($id);
        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        \Validator::make($request->all(),[
           "name" => "required|min:5|max:100",
           "roles" => "required",
           "phone" => "required|digits_between:10,12",
           "address" => "required|min:20|max:200",
        ])->validate();
        $user = \App\User::find($id);
        $gmbr =  $request->file('avatar');
        $gambar = \App\User::where('id',$id)->first();
        $user->name= $request->get('name');
        $user->roles = json_encode($request->get('roles'));
        $user->address =$request->get('address');
        $user->phone = $request->get('phone');
        $user->status = $request->get('status');
        if($gmbr!='') {
        $filename = time().'.'.$gmbr->extension();
        $addString = public_path().'\images\\';
        $proses = $request->file('avatar')->move(public_path('images'), $filename);
        $user['avatar'] = $addString.$filename;
        File::delete(public_path('images'),$gambar->avatar); //replace file yang sudah ada
        }

        $user->save();
        return redirect()->route('users.edit', ['id' => $id])->with('status','Sukses edit');
        //return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gambar = \App\User::where('id',$id)->first();
        $user = \App\User::findOrFail($id);
        File::delete(public_path('images'),$gambar->avatar);
        $user->delete();
        return redirect()->route('users.index')->with('status','user berhasil dihapus');
    }
}
