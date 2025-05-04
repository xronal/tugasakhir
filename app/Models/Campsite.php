<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Campsite extends Model
{
    use HasFactory;
    protected $primaryKey = 'campsite_code';
    public $incrementing = false;
    protected $keyType = 'string';
}
