<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cat = \App\Category::paginate(5);
        $filter = $request->get('name');
        if ($filter) {
          $cat = \App\Category::where('name','LIKE',"%$filter%")->paginate(5);
        }
        return view('category.index',['moh'=>$cat]);
    }

    public function cari(Request $req){
      $category = \App\Category::paginate(5);
      $filter = $req->get('name');
      if ($filter) {
        $category = \App\Category::where('name','LIKE',"%$filter%")->paginate(5);
      }
      return view('category.trash',['category'=>$category]);
    }

    public function searchAjax(Request $req){
      $keyword = $req->get('q');
      $category = \App\Category::where("name","LIKE","%$keyword%")->get();
      return $category;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
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
      $nam = $request->get('name');
      $createCategory = new \App\Category;
      $createCategory->name = $nam;
      if ($request->file('image')) {
        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        // $imgPat = $request->file('image')->store('images','public');
        $imgPat = $file->store('images','public',$nama_file);
        $createCategory->image =$imgPat;
      }
     $createCategory->created_by = \Auth::user()->id;
     $createCategory->slug = \Str::slug($nam, '-');
     $createCategory->save();
     return redirect()->route('category.create')->with('status','Category Sukses dItambahkan');
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
        $kat = \App\Category::findOrFail($id);
        return view('category.show',['cat'=>$kat]);
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
        $cat = \App\Category::findOrFail($id);
        return view('category.edit',['cat'=>$cat]);
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
        $nam = $request->get('name');
        $slug = $request->get('slug');
        $kat = \App\Category::find($id);
        $kat->name = $nam;
        $kat->slug = $slug;
        if ($request->file('image')) {
          // if (($kat->image && file_exists(storage_path('app/public/' .
          //     $kat->image))) {
          //   \Storage::delete('public/'.$kat->name);
          // }
          $newKat =$request->file('image')->store('images','public');
          $kat->image = $newKat;
        }
        $kat->updated_by =  \Auth::user()->id;
        $kat->slug = \Str::slug($nam);
        $kat->save();
        return redirect()->route('category.edit', ['id' => $id])->with('status','Sukses edit');
        //return redirect()->route('category.edit',['id'=>$id]->with('status','Sukses edit');

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
        $kat = \App\Category::findOrFail($id);
        $kat->delete();
        return redirect()->route('category.index')->with('status', 'Category successfully moved to trash');
    }

    public function trash(Request $req){
      $category =  \App\Category::onlyTrashed()->paginate(5);

      // $category = \App\Category::paginate(5);
      // $filter = $req->get('name');
      // if ($filter) {
      //   $category = \App\Category::where('name','LIKE',"%$filter%")->paginate(5);
      // }
      return view('category.trash',['category'=>$category]);
    }

    public function restore($id){
      $kat = \App\Category::withTrashed()->findOrFail($id);
      if ($kat->trashed()) {
        $kat->restore();
      }else {
          return redirect()->route('category.index')->with('status','Category tidak direstore');
      }
        return redirect()->route('category.index')->with('status','Category berhasil direstore');
    }

    public function deletePermanent($id){

      // $katdua = \App\Category::findOrFail($id);
      // $katdua->delete();
      // return redirect()->route('category.index')->with('status','Kategory TELAH dihapus permanent');
      $kat = \App\Category::withTrashed()->findOrFail($id);
      if (!$kat->trashed()) {
        return redirect()->route('category.index')->
        with('status','tidak dapat hapus permanent category');
      }else {
        $kat->forceDelete();
        return redirect()->route('category.index')
        ->with('status','Kategory TELAH dihapus permanent');
      }

    }


}
