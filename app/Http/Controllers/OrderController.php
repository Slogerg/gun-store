<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        //removing all from basket
        $guns = Basket::where('user_id',$request->user_id)->delete();

        $data = $request->input();

        Order::create($data);
        return view('thank');

    }
}
