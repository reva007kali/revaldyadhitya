<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($cv) {
            $cv->uuid = (string) Str::uuid();
        });
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function languages()
    {
        return $this->hasMany(Language::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    public function seamanExperiences()
    {
        return $this->hasMany(SeamanExperience::class);
    }
    public function template()
    {
        return $this->belongsTo(CvTemplate::class, 'cv_template_id');
    }
}
