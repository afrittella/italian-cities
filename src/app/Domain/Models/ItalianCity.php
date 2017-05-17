<?php

namespace Afrittella\ItalianCities\Domain\Models;

use Illuminate\Database\Eloquent\Model;

use Afrittella\ItalianCities\Domain\Models\ItalianState;
use Afrittella\ItalianCities\Domain\Models\ItalianPostalCode;

class ItalianCity extends Model
{
    protected $hidden = ['italian_state_id'];

    protected $appends = ['italian_state', 'italian_postal_codes'];

    protected $guarded = [];

    public $timestamps = false;

    public function italian_state()
    {
        return $this->belongsTo(ItalianState::class);
    }

    public function italian_postal_codes()
    {
        return $this->hasMany(ItalianPostalCode::class);
    }

    public function getItalianStateAttribute()
    {
        return $this->italian_state()->first();
    }

    public function getItalianPostalCodesAttribute()
    {
        return $this->italian_postal_codes()->get();
    }

    public function scopeGetByItalianPostalCode($query, $code)
    {                
        $query->whereHas('italian_postal_codes', function($query) use ($code) {
                $query->where('code', '=', $code);
        });                    
    }
}
