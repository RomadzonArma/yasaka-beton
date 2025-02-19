<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'role_id',
        'hire_date',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
