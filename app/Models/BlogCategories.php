<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    //
    protected $table = 'blog_categories';
    public $timestamps = 'true';
    protected $guarded = [];
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id');
    }
}
