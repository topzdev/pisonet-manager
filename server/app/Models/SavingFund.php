<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SavingFund extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'saving_fund';

    protected $fillable = [
        'percentage',
        'description',
        "shop_id"
    ];
}
