<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_on',
        'image',
        'alt',
        'order_level',
        'status',
    ];

    
     public function getImageUrlAttribute(){
        return $this->image ? asset('images/' . $this->image) : asset('noimage.png');
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


    public static function getTotalGallery(){
      return self::count();
    }

    public static function getTotalGalleryLastWeek(){
     $startOfWeek = Carbon::now()->startOfWeek()->subWeek();
     $endOfWeek = Carbon::now()->endOfWeek()->subWeek();
     return self::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
   }

}
