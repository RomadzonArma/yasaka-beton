<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = ['equipment_id', 'customer_id', 'rental_date', 'return_date', 'rental_rate', 'total_amount'];

    public function equipment() {
        return $this->belongsTo(Equipment::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
