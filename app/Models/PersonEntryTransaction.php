<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonEntryTransaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_code';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
}
