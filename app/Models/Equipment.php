<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = ['equipment_name', 'type', 'operator_id', 'last_maintenance'];

    public function operator() {
        return $this->belongsTo(Employee::class, 'operator_id');
    }
}
