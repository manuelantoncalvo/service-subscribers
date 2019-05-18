<?php

namespace App\Models;

use App\Models\AbstractModel\Base;

class User extends Base
{
    protected $fillable = ['name', 'email'];
    protected $rules = ['name' => 'required|string', 'email' => 'required|email'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

}
