<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
        'hmo_name',
        'hmo_type',
        'billed_period',
        'billed_amount',
        'payment_date',
        'paid_amount',
        'difference',
        'attachment',
        'remark'
    ];
    



    
    
    public function getDifferenceAttribute()
       {
           return $this->billed_amount - $this->paid_amount;
       }
    
    

    public function hmo()
    {
        return $this->belongsTo(Hmo::class);
    }
}