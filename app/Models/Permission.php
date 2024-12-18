<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
    'permission' => 'json',
    ];

    protected $fillable = [
     'role_id', 'permission'
    ];

    // Permission belongs to one role
     public function role(){
      return $this->belongsTo(Role::class, 'role_id');
    }
}
