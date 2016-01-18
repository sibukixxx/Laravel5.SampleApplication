<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['content', 'created_at', 'updated_at'];

    protected $jsonColumns = ['json_data'];
}