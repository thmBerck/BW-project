<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'submits';

    // The attributes that are mass assignable
    protected $fillable = ['contactText'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
