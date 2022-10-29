<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shareholder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'percentage',
        'email',
    ];

    protected $hidden = [
        'password'
    ];
}
