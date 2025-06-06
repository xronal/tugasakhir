<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'customer_code';
    public $incrementing = false;
    protected $keyType = 'string';

    // App\Models\Customer.php
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
