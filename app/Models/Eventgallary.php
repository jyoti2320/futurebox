<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventgallary extends Model
{
    protected $table = 'event_gallary';
    protected $guarded;

    public function getImagePathsAttribute()
    {
        if (!$this->images) {
            return [];
        }
        return explode(',', $this->images);
    }
}
