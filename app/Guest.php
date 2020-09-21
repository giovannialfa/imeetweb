<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guestId', 'type', 'fullname', 'phone', 'company', 'email', 'nesessity', 'imageUrl', 'staffId', 'status', 'building'
    ];
}
