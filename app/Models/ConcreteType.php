<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConcreteType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type_name',
        'profit_percentage',
        'price_per_cubic',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
