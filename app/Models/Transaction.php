<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_code';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function PackageTransaction()
    {
        return $this->hasMany(PackageTransaction::class, 'transaction_code', 'transaction_code');
    }

    public function AddonsTransaction()
    {
        return $this->hasMany(AddonsTransaction::class, 'transaction_code', 'transaction_code');
    }

    public function CampsiteTransaction()
    {
        return $this->hasMany(CampsiteTransaction::class, 'transaction_code', 'transaction_code');
    }

    public function PersonEntryTransaction()
    {
        return $this->hasMany(PersonEntryTransaction::class, 'transaction_code', 'transaction_code');
    }
}
