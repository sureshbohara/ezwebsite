<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['businesses_id', 'name', 'comments'];
    public function businesses(){
      return $this->belongsTo(Business::class);
    }
}
