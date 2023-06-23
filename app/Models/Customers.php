<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers'; // it is used to define table for this model
    protected $primaryKey = 'customer_id'; // it is use to add given table primary key
}
