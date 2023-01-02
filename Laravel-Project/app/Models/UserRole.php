<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function role() {
        return $this->hasOne(Role::class);
    }
    use HasFactory;
}
