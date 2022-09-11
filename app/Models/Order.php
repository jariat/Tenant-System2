<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'rental_orders';
    protected $fillable = [
       'tenant_id','user_id', 'contract_id','house_id'
    ];
   
}
