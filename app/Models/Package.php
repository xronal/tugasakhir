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

    public function details()
    {
        return $this->hasMany(PackageDetail::class, 'package_code', 'package_code');
    }

    public function campsite()
    {
        return $this->belongsTo(Campsite::class, 'campsite_code', 'campsite_code');
    }
}
