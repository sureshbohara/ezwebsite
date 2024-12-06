<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class Faqs extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_on',
        'question',
        'answer',
        'order_level',
        'status',
    ];

  

   public function getImageUrlAttribute(){
        return $this->image ? asset('storage/images/' . $this->image) : asset('noimage.png');
    }

    public static function getTotalFaqs(){
      return self::count();
    }

    public static function getTotalFaqsLastWeek(){
     $startOfWeek = Carbon::now()->startOfWeek()->subWeek();
     $endOfWeek = Carbon::now()->endOfWeek()->subWeek();
     return self::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
   }

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

    public function scopeDisplayOn($query, $value){
        return $query->where('display_on', $value);
    }
}
