<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'acronym',
        'description',
        'category',
        'email',
        'status',
    ];

    public function officers(): HasMany
    {
        return $this->hasMany(Officer::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function memberships(): HasMany
    {
        return $this->hasMany(Membership::class);
    }
}
