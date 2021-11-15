<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Category;
use App\Models\Gun;
use Illuminate\Http\Request;

class GunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gun::all();
        return view('admin.gun-index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.gun-create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        if( $request->hasFile('image')){

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "image/".$filename."_".time().".".$extention;
            $path = $request->file('image')->storeAs('public/', $fileNameToStore);

        }
        $data['image'] =$path;
        $result = Gun::create($data);
        if ($result)
            return redirect()->route('gun.index');
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
        $item = Gun::query()->where('id',$id)->first();
        $categories = Category::all();
        return view('admin.gun-edit',compact('categories','item'));
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
        $item = Gun::where('id',$id)->first();

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = "image/".$filename."_".time().".".$extention;
        $path = $request->file('image')->storeAs('public/', $fileNameToStore);

        $data = $request->all();
        $item->update($data);
        $item->update(['image' => $path]);
        return redirect()->route('gun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gun::where('id',$id)->first()->destroy($id);
        Basket::where('gun_id',$id)->delete();
        return redirect()->route('gun.index');
    }
}
