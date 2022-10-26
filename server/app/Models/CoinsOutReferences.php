<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoinsOutReferences extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function savingFund()
    {
        return $this->hasOne(SavingFund::class);
    }

    public function electrictyCharge()
    {
        return $this->hasOne(ElectricityCharge::class);
    }
}
