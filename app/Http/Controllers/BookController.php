<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use File;
class BookController extends Controller
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
           if (Gate::allows('manage-book')) return $next($request);
           abort(403,'Anda tidak memiliki hak akses');
         });
       }



    public function index(Request $req)
    {
        //
        // $buku = \App\Book::with('category')->paginate(5);

        $status = $req->get('status');
        $keyword = $req->get('keyword') ? $req->get('keyword'):'';
        if ($status) {
          $buku = \App\Book::where('status','LIKE', "%$status%")
          ->where('status',$status) //kusus tambahan filter status
          ->paginate(5);
        }else {
          $buku = \App\Book::with('category')->where('title',"LIKE","%$keyword%")->paginate(5);
        }
        return view('book.index',['pek'=>$buku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $buku = new \App\Book;
        $buku->title = $req->get('title');
        $buku->description = $req->get('description');
        $buku->author= $req->get('author');
        $buku->publisher = $req->get('publisher');
        $buku->price = $req->get('price');
        $buku->stock = $req->get('stock');
        $buku->status = $req->get('save_action');
        $cover = $req->file('cover');
        if ($cover) {
          $path = $cover->store('buku','public');
          $buku->cover = $path;
        }
        $buku->slug = \Str::slug($req->get('title'));
        $buku->created_by = \Auth::user()->id;
        $buku->save();

        $buku->category()->attach($req->get('category')); //mengakap req categori dan disimpan kedalm model
        if ($req->get('save_action') == 'PUBLISH') {
          return redirect()
            ->route('book.create')
            ->with('status','buuku berhasil disimpan');
        }else {
          return redirect()
          ->route('book.create')
          ->with('status','buku disimpan didraft');
        }
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
        $buku = \App\Book::findOrFail($id);
        return view('book.edit',['buku'=>$buku]);
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
         $buku = \App\Book::findOrFail($id);
         $buku->slug = $request->get('slug');
         $buku->title = $request->get('title');
         $buku->description = $request->get('description');
         $buku->author = $request->get('author');
         $buku->price = $request->get('price');
         $sampul = $request->file('cover');
         if($sampul){
           if($buku->cover && file_exists(storage_path('app/public/' .$buku->cover))){
           \Storage::delete('public/'. $buku->cover);
           }
           $patSampul= $sampul->store('book','public');
           $buku->cover = $patSampul;
         }
         $buku->updated_by = \Auth::user()->id;
         $buku->status = $request->get('status');
         $buku->save();
         $buku->category()->sync($request->get('category'));
         return redirect()->route('book.edit',['id'=>$buku->id])
         ->with('status','Buku berhasil diubah');
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
        $pic = \App\Book::where('id',$id)->first();
        $buku = \App\Book::findOrFail($id);
        File::delete(public_path('storage.book'),$pic->cover);
        $buku->delete();
        return redirect()->route('book.index')->with('status','bpok berhasil dihapus');

    }
}
