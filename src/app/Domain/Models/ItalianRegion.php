<?php

namespace Afrittella\ItalianCities\Domain\Models;

use Illuminate\Database\Eloquent\Model;

use Afrittella\ItalianCities\Domain\Models\ItalianState;

class ItalianRegion extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function italian_states()
    {
        return $this->hasMany(ItalianState::class);
    }

    public function getItalianStatesAttribute()
    {        
        return $this->italian_states()->get();
    }
}
