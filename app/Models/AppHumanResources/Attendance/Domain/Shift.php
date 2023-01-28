<?php

namespace App\Models\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'start_time', 'end_time',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
