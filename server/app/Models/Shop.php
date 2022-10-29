<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'start_date'
    ];

    public function coinsOut()
    {
        return $this->hasMany(CoinsOut::class, 'shop_id', 'id');
    }

    public function shareholders()
    {
        return $this->hasMany(Shareholder::class, 'shop_id', 'id');
    }

    public function savingFunds()
    {
        return $this->hasMany(SavingFund::class, 'shop_id', 'id');
    }

    public function electricityCharges()
    {
        return $this->hasMany(ElectricityCharge::class, 'shop_id', 'id');
    }
}
