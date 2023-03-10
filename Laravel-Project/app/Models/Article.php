<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'articles';

    // The attributes that are mass assignable
    protected $fillable = ['title', 'body'];
}
