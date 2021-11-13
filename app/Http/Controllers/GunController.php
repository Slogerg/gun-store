<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Gun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GunController extends Controller
{
    public function index()
    {
        $items = Gun::all();
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
}
