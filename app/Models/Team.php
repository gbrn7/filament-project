<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function departements(): HasMany
    {
        return $this->hasMany(Departement::class);
    }

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
