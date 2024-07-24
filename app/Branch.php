<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $fillable = ['branch_name', 'address', 'latitude', 'longitude'];

    public static function boot()
{
    parent::boot();

    static::creating(function ($branch) {
        
    });

    static::updating(function ($branch) {
       
    });

    static::deleting(function ($branch) {
       
    });
}

}

