<?php

namespace App\Models;

use App\Models\AbstractModel\Base;

class User extends Base
{
    protected $fillable = ['name', 'email'];
    protected $rules = ['name' => 'required', 'email' => 'required'];
}
