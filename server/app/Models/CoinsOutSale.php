<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoinsOutSale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'shareholder_percentage'
    ];

    public function coinsOut() {
        return $this->belongsTo(CoinsOut::class, 'coins_out_id', 'id');
    }

    public function shareholder() {
        return $this->belongsTo(Shareholder::class, 'id', 'shareholder_id');
    }


}
