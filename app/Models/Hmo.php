<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hmo extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'type',
        'status',
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}
