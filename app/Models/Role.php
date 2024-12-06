<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';  
    protected $guarded = [];  

    // One role has one permission
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    // One role can have many admins
    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }

    // Automatically delete related admins when the role is deleted
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($role) {
            $role->admins()->delete();
        });
    }
}
