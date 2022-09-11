<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
       'name', 'features', 'location', 'occupied', 'monthly_amount'
    ];

    public function tenant() 
{
    return $this->hasMany(Tenant::class);
}
}
