<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Basket extends Model
{
    use HasFactory;
    protected $fillable = [
      'gun_id',
      'count',
      'price',
      'user_id',
    ];

    public function gun()
    {
        return $this->belongsTo(Gun::class,'gun_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sum()
    {
        return $this->count * $this->gun->price;
    }

    public function total()
    {
        $items = Basket::where('user_id',Auth::user()->id)->get();
        $sum = 0;
        foreach ($items as $item) {
            $sum += $item->count * $item->gun->price;
        }
        return $sum;
    }

}
