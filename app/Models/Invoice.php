<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_number', 'order_id', 'invoice_date', 'due_date', 'total_amount', 'payment_status'];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
