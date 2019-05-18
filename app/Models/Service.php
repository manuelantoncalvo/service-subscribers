<?php

namespace App\Models;

use App\Models\AbstractModel\Base;

class Service extends Base
{
    protected $fillable = ['name'];
    protected $rules = ['name' => 'required|string'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(ServiceUser::class)
            ->where('cancel_at','=', null)
            ->withPivot(['service_id', 'user_id', 'subscribe_at', 'cancel_at']);
    }
}
