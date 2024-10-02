<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_name',
        'phone_number',
        'email',
        'payment_method',
        'concrete_type_id',
        'area_width',
        'area_length',
        'total_area',
        'total_trucks',
        'status',
        'created_at',
        'updated_at',
    ];

    public function concreteType()
    {
        return $this->belongsTo(ConcreteType::class);
    }

    public function armada()
    {
        return $this->belongsTo(Armada::class);
    }
}
