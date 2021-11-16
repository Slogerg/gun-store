<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'caliber',
        'bullets',
        'description',
        'price',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function haveGun($gun_id,$user_id,$object)
    {
        if($object == 'Basket')
            $gun = Basket::query()->where('user_id',$user_id)->where('gun_id',$gun_id)->first();
        else
            $gun = Liked::query()->where('user_id',$user_id)->where('gun_id',$gun_id)->first();
        if ($gun == null)
            return false;
        else return true;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
