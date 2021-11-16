<?php

namespace App\Http\Controllers;

use App\Models\Liked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikedController extends Controller
{
    public function index()
    {
        $items = Liked::where('user_id',Auth::user()->id)->get();
        return view('liked',compact('items'));
    }

    public function destroy($id)
    {
        Liked::where('id',$id)->first()->destroy($id);
        return redirect()->route('liked');
    }
}
