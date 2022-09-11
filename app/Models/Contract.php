<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
       'length', 'mode_of_payment', 'monthly_payment', 'penalities', 'status', 'signature','name'
    ];
}
