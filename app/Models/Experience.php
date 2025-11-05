<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    public $guarded = [];
     public function cv() {
        return $this->belongsTo(Cv::class);
    }
}
