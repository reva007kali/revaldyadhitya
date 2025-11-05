<?php

namespace App\Models;

use App\Models\Cv;
use Illuminate\Database\Eloquent\Model;

class SeamanExperience extends Model
{
    public $guarded = [];
     public function cv() {
        return $this->belongsTo(Cv::class);
    }
}
