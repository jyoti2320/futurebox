<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blogs';
    protected $guarded;
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(BlogCategories::class, 'blog_category_id');
    }
}
