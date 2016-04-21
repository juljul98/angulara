<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = array('id', 'image', 'name', 'email', 'contact', 'position', 'department');
}
