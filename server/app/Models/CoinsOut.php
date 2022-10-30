<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoinsOut extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'coins_out';

    protected $fillable = [
        "title",
        "description",
        "start_date",
        "end_date"
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id',  'id');
    }

    public function coinsOutSales()
    {
        return $this->hasMany(CoinsOutSale::class,'coins_out_id', 'id');
    }

    public function savingFund()
    {
        return $this->hasOne(SavingFund::class, 'id', 'saving_fund_id');
    }

    public function electricityCharge()
    {
        return $this->hasOne(ElectricityCharge::class, 'id', 'electricity_charge_id');
    }
}
