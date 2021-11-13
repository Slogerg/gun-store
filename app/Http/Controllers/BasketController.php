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
}
