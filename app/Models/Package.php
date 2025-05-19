<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = 'package_code';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function PackageDetail()
    {
        return $this->hasMany(PackageDetail::class, 'package_code', 'package_code');
    }
}
