<?php

namespace doctype_admin\Website\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];


    // Set redirect link if empty
    public function setServiceRedirectLinkAttribute($value)
    {
        if (is_null($value)) {
            $this->attributes['service_redirect_link'] = config('website.service_default_redirect_link', '#');
        } else {
            $this->attributes['service_redirect_link'] = $value;
        }
    }

    // Set service icon if empty
    public function setServiceIconAttribute($value)
    {
        if (is_null($value)) {
            $this->attributes['service_icon']  = config('website.service_default_icon', 'fa fa-concierge-bell');
        } else {
            $this->attributes['service_icon'] = $value;
        }
    }

    /* Cache forget on saving or updating and deleting */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('services');
        });

        static::deleting(function () {
            Cache::forget('services');
        });
    }
}
