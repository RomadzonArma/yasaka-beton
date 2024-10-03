<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['employee_name', 'role', 'phone', 'address', 'hire_date', 'salary'];
}
