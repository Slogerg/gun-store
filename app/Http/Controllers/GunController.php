<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Gun;
use App\Models\Liked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GunController extends Controller
{
    public function index()
    {
        $items = Gun::paginate(5);
        $baskets = Basket::query()->where('user_id',Auth::user()->id)->get();
        return view('guns',compact('items'));
    }

    public function addInBasket(Request $request)
    {
        $data = $request->input();

        $result = Basket::create($data);
        if ($result)
            return redirect()->route('guns');
    }

    public function addInLiked(Request $request)
    {
        $data = $request->input();

        $result = Liked::create($data);
        if ($result)
            return redirect()->route('guns');
    }

    public function single($id)
    {
        $item = Gun::query()->where('id',$id)->first();
        return view('gun-show',compact('item'));
    }

    public function searchByName(Request $request)
    {
        $items = Gun::query()->where('name','LIKE',"%{$request->name}%")->paginate(5);
        return view('guns',compact('items'));

    }

    public function sortByPrice(Request $request)
    {
        if($request->select == "expensive")
            $items = Gun::orderBy('price','DESC')->paginate(5);

        elseif ($request->select == "cheaper")
            $items = Gun::orderBy('price')->paginate(5);

        else
            $items = Gun::paginate(5);

        return view('guns',compact('items'));
    }

    public function sortByDate(Request $request)
    {
        if($request->select == "desc")
            $items = Gun::orderBy('created_at','DESC')->paginate(5);

        elseif ($request->select == "sort")
            $items = Gun::orderBy('created_at')->paginate(5);

        else
            $items = Gun::paginate(5);

        return view('guns',compact('items'));

    }



}
