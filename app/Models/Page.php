<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_on', 'name', 'slug', 'excerpt', 'description', 'image', 'order_level', 'template', 'page_list', 
        'meta_keywords', 'meta_description', 'status',
    ];

    protected $casts = [
        'page_list' => 'json',
    ];

    // Automatically generate slug from name.
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Get image URL or default image.
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('images/' . $this->image) : asset('default-image.jpg');
    }

    public static function getTotalPage(){
     return self::count();
    }


    // Toggle status between active/inactive.
    public function toggleStatus()
    {
        $this->status = !$this->status;
        $this->save();
    }

    // Scope for active pages.
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Scope for ordered pages.
    public function scopeOrdered($query)
    {
        return $query->orderBy('order_level', 'asc');
    }

    // Get paginated list of pages.
    public static function getRecords()
    {
        return self::ordered()->paginate(15);
    }
}
