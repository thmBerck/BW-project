<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'orders';

    // The attributes that are mass assignable
    protected $fillable = ['projectName', 'description', 'footageLink', 'priceRange'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
