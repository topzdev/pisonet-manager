<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElectricityCharge extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'electricity_charge';

    protected $fillable = [
        'start_date',
        'end_date',
        'kwh',
        'kwh_charge',
        "shop_id"
    ];
}
