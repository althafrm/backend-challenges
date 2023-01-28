<?php

namespace App\Models\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
