<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Plans extends Model
{
     use HasFactory;
     protected $table = 'plans';
     protected $fillable = [
        'display_on',
        'name',
        'price',
        'excerpt',
        'package_feature',
        'bg_color',
        'order_level',
        'status',
    ];
      protected $casts = [
        'package_feature' => 'json',
    ];

    public function toggleStatus(){
        $this->status = !$this->status;
        $this->save();
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }


    public function scopeOrdered($query){
        return $query->orderBy('order_level', 'asc');
    }


    public static function getRecords(){
        return self::ordered()->paginate(15);
    }
   

     public static function getTotalPlans(){
        return self::count();
    }

      public static function getTotalPlansLastWeek(){
        $startOfWeek = Carbon::now()->startOfWeek()->subWeek();
        $endOfWeek = Carbon::now()->endOfWeek()->subWeek();
        return self::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
    }
    
}
