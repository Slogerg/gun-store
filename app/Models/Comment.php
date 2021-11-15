<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
      'text',
      'user_id',
      'gun_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gun()
    {
        return $this->belongsTo(Gun::class);
    }
}
