<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->input();
        Comment::create($data);
        return redirect()->route('gun.single',$request->gun_id);
    }

    public function destroy(Request $request,$id)
    {
        Comment::where('id',$id)->first()->destroy($id);
        return redirect()->route('gun.single',$request->gun_id);
    }
}
