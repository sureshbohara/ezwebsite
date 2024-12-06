<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'banner_title', 'banner_sub_title', 'description', 'image', 'banner_link', 'order_level', 'status'
    ];

    // Accessor to get the image URL
    public function getImageUrlAttribute(){
        return $this->image ? asset('images/' . $this->image) : asset('noimage.png');
    }

    // Toggle the status between 0 and 1
    public function toggleStatus(){
        $this->status = !$this->status;
        $this->save();
    }

    // Active scope: Only show banners with active status
    public function scopeActive($query){
        return $query->where('status', 1);
    }

    // Ordered scope: Sort banners by order_level
    public function scopeOrdered($query){
        return $query->orderBy('order_level', 'asc');
    }

    // Static method for paginated results
    public static function getRecords(){
        return self::ordered()->paginate(15); // Pagination method
    }
}
