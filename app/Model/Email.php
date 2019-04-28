<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';
    protected $primaryKey='email_id';
    public $timestamps = false;
   
}
