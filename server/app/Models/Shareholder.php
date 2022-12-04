<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        "id",
        'color'
    ];

    protected $casts = [
        'percentage' => 'double'
    ];

    protected $hidden = [
        'password'
    ];

    protected $appends = ['initials'];

    public function getInitialsAttribute()
    {
        return strtoupper(substr($this->firstname, 0, 1) . substr($this->lastname, 0, 1));
    }
};
