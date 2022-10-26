<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shareholders extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
    ];

    protected $hidden = [
        'password'
    ];

    public function shareholderPercentage()
    {
        return $this->hasOne(ShareholdersPercentage::class);
    }
}
