<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'production_date', 'produced_volume', 'status', 'supervisor_id'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function supervisor() {
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }
}
