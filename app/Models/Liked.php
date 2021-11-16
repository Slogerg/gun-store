<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liked extends Model
{
    use HasFactory;
    protected $fillable = [
        'gun_id',
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

}
