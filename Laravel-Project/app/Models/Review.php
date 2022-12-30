<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'reviews';

    // The attributes that are mass assignable
    protected $fillable = ['title', 'rating', 'description'];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
