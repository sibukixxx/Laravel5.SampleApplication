<?php

namespace App\Eloquent;

use Log;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';
    protected $fillable = [
        'name'       , 'country',
        'prefecture' , 'address',
        'postal_code', 'telephone'
    ];
    public $timestamps = true;

}