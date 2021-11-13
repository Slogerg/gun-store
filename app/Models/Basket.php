<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $this->belongsTo(Gun::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function haveGun($gun_id,$user_id)
    {
        $gun = Basket::query()->where('user_id',$user_id)->where('gun_id',$gun_id)->first();
        dd($gun);
    }

}
