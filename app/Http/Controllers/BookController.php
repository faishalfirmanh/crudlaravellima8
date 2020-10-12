<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $book = \App\Book::with('category')->paginate(10);
        return view('book.index',['pek'=>$book]);
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
        $book = new \App\Book;
        $book->title = $req->get('title');
        $book->description = $req->get('description');
        $book->author= $req->get('author');
        $book->publisher = $req->get('publisher');
        $book->price = $req->get('price');
        $book->stock = $req->get('stock');
        $book->status = $req->get('save_action');
        $cover = $req->file('cover');
        if ($cover) {
          $path = $cover->store('book','public');
          $book->cover = $path;
        }
        $book->slug = \Str::slug($req->get('title'));
        $book->created_by = \Auth::user()->id;
        $book->save();
        $book->category()->attach($req->get('category'));
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
