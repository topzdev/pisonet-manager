<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoinsOut extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "description",
        "start_date",
        "end_date"
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function coinsOutSales()
    {
        return $this->hasOne(CoinsOutSales::class);
    }

    public function savingFund()
    {
        return $this->hasOne(SavingFund::class);
    }

    public function electricityCharge()
    {
        return $this->hasOne(ElectricityCharge::class);
    }
}
