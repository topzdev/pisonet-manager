<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shareholder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'shareholder';

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'percentage',
        'password',
        'email',
        'shop_id',
        "id"
    ];

    protected $hidden = [
        'password'
    ];
}
