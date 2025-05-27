<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonEntry extends Model
{
    use HasFactory;
    protected $primaryKey = 'person_entry_code';
    public $incrementing = false;
    protected $keyType = 'string';
}
