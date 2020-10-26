<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
      *
      */

       public function __construct()
       {
         $this->middleware(function($request,$next){
           if (Gate::allows('manage-order')) return $next($request);
           abort(403,'Anda tidak memiliki hak akses');
         });
       }


    public function index(Request $request)
    {
        //
       $stat = $request->get('status');
       $buyer_mail = $request->get('buyer_email');
       // $order = \App\Order::with('user')->with('book')->paginate(5);
       $order = \App\Order::with('user')
              ->with('book')
              ->whereHas('user',function($query) use ($buyer_mail){
                $query->where('email','LIKE',"%$buyer_mail%");
              })
              ->where('status','LIKE',"%$stat%")
              ->paginate(5);
      //  $order = \App\Order::paginate(5);

        return view('order.index',['order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $pes = \App\Order::findOrFail($id);
        return view('order.edit',['pesan'=>$pes]);
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
        $order = \App\Order::findOrFail($id);
        $order->status = $request->get('status');
        $order->save();
        return redirect()->route('order.edit', ['id' => $order->id])->with('status', 'Order status succesfully updated');

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
    }
}
