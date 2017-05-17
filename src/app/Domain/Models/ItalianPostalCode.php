<?php

namespace Afrittella\ItalianCities\Domain\Models;

use Illuminate\Database\Eloquent\Model;

use Afrittella\ItalianCities\Domain\Models\ItalianCity;

class ItalianPostalCode extends Model
{
    protected $hidden = ['italian_city_id', 'id'];
    protected $guarded = [];
    public $timestamps = false;
    //protected $appends = ['city'];

    public function italian_city()
    {
        return $this->belongsTo(ItalianCity::class);
    }

    public function getItalianCityAttribute()
    {
        return $this->italian_city()->get();
    }
}
