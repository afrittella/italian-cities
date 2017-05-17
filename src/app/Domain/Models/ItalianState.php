<?php

namespace Afrittella\ItalianCities\Domain\Models;

use Illuminate\Database\Eloquent\Model;

use Afrittella\ItalianCities\Domain\Models\ItalianRegion;

class ItalianState extends Model
{
    protected $hidden = ['italian_region_id'];
    protected $guarded = [];
    public $timestamps = false;

    //protected $appends = ['region'];
    

    public function italian_region()
    {
        return $this->belongsTo(ItalianRegion::class);
    }

    public function italian_cities()
    {
        return $this->hasMany(ItalianCity::class);
    }

    public function getItalianRegionAttribute()
    {
        return $this->italian_region()->first();
    }
}
