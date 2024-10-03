<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $fillable = ['vehicle_id', 'equipment_id', 'maintenance_date', 'maintenance_details'];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function equipment() {
        return $this->belongsTo(Equipment::class);
    }
}
