<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['vehicle_number', 'type', 'driver_id', 'last_maintenance'];

    public function driver() {
        return $this->belongsTo(Employee::class, 'driver_id');
    }
}
