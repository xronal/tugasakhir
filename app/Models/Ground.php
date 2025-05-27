<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    use HasFactory;
    protected $primaryKey = 'ground_code';
    public $incrementing = false;
    protected $keyType = 'string';
}
