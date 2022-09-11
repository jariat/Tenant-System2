<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
       'lastname','firstname', 'middlename','house_id', 'gender', 'national_id', 'telephone', 'email', 'status','registration_date', 'exit_date', 'number_of_household'
    ];
    public function house() 
{
    return $this->belongsTo(House::class);
}
}
