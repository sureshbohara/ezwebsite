<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'menu_icon', 'url', 'parent_id', 'order_level', 'display_on', 'status','is_cms_page'];

    
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order_level');
    }

  
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_level', 'asc');
    }

 
    public function toggleStatus()
    {
        $this->status = !$this->status;
        $this->save();
    }

   
    public static function getRecords(){
    $query = self::query(); 

    if (!is_null(request('status')) && request('status') !== '') {
        $status = request('status');
        $query->where('status', '=', $status);
     }

     if (!empty(request('display_on'))) {
        $query->where('display_on', '=', request('display_on'));
    }

      if (request()->filled('name')) {
        $query->where('name', 'LIKE', '%' . request('name') . '%');
     }

     return $query->ordered()->paginate(25);
    }

 
   
    public function scopeDisplayOn($query, $value){
        return $query->where('display_on', $value);
    }
}
