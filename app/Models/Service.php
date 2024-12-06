<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;  
use Carbon\Carbon;

class Service extends Model
{
    use HasFactory;
    
    protected $table = 'services';
    protected $fillable = [
        'whyChoose_ids',
        'service_title',
        'slug', 
        'service_sub_title',
        'excerpt',
        'description',
        'service_feature',
        'image',
        'display_on',
        'feature_image',
        'order_level',
        'status',
        'meta_keywords',
        'meta_description'
    ];

    // Mutator for setting service title and slug
    public function setServiceTitleAttribute($value){
        $this->attributes['service_title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Cast the service_feature attribute as JSON
    protected $casts = [
        'service_feature' => 'json',
    ];

    // Image URL getter
    public function getImageUrlAttribute(){
        return $this->image ? asset('images/' . $this->image) : asset('noimage.png');
    }

    // Feature image URL getter
    public function getFeatureUrlAttribute(){
        return $this->feature_image ? asset('images/' . $this->feature_image) : asset('noimage.png');
    }

    // Static method to get total services
    public static function getTotalService(){
        return self::count();
    }

    // Static method to get services created last week
    public static function getTotalServiceLastWeek(){
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();
        return self::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
    }

    // Toggle the status of the service
    public function toggleStatus(){
        $this->status = !$this->status;
        return $this->save();
    }

    // Scope to filter active services
    public function scopeActive($query){
        return $query->where('status', 1);
    }

    // Scope to order services by order level
    public function scopeOrdered($query){
        return $query->orderBy('order_level', 'asc');
    }

    // Static method to get paginated service records
    public static function getRecords(){
        return self::ordered()->paginate(15);
    }

    public function whyChoose(){
      return WhyChoose::whereIn('id', json_decode($this->whyChoose_ids, true))->get();
   }


   public static function getServiceHomeRecord(){
    return self::active()->ordered()->where('display_on', 'Transport')->limit(4)->get();
   }


}
