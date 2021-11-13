<?php

namespace App\Http\Controllers;

use App\Models\Gun;
use Illuminate\Http\Request;

class GunController extends Controller
{
    public function index()
    {
        $items = Gun::all();
        return view('guns',compact('items'));
    }
}
