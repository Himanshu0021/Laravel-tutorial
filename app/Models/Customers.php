<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customers'; // it is used to define table for this model
    protected $primaryKey = 'customer_id'; // it is use to add given table primary key

    /**
     * Using this function we will capitalize the name on submitting customer registration form called mutator
     * @param string $value
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }
    public function getEmailAttribute($value) {
       return $this->attributes['email'] = strtoupper($value);
    }
}
