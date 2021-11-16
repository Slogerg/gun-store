<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index()
    {
        $items = Basket::where('user_id',Auth::user()->id)->get();
        return view('basket',compact('items'));
    }

    public function destroy($id)
    {
        Basket::where('id',$id)->first()->destroy($id);
        return redirect()->route('basket');
    }

    public function reloadCount(Request $request)
    {
        $item = Basket::where('id',$request->id)->first();
        $item->update(['count' => $request->count]);
        return redirect()->route('basket');
    }



}
