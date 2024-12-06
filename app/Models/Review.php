<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    
    protected $fillable = [
        'name', 'email', 'address', 'rating', 'image', 'review','content', 'display_on', 'order_level', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'rating' => 'integer',
        'order_level' => 'integer',
    ];

    // Image URL attribute
    public function getImageUrlAttribute(){
        return $this->image ? asset('images/' . $this->image) : asset('tpr.png');
    }

  
    

    public static function getAverageReview(){
      return self::average('rating');
  }


  

    // Toggle status helper
    public function toggleStatus(){
        $this->status = !$this->status;
        $this->save();
    }

    // Scoped queries
    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function scopeOrdered($query){
        return $query->orderBy('order_level', 'asc');
    }

    // Fetch ordered records with pagination
    public static function getRecords(){
        return self::ordered()->paginate(15);
    }

    // Delete the image when the review is deleted
    protected static function booted(){
        static::deleting(function ($review) {
            if ($review->image) {
                Storage::delete('images/' . $review->image);
            }
        });
    }

   

}
