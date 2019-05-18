<?php

namespace App\Models;

use App\Models\AbstractModel\BasePivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceUser extends BasePivot
{
    use SoftDeletes;

    const DELETED_AT = 'cancel_at';
    protected $dates = ['cancel_at'];
    protected $fillable = ['service_id', 'user_id', 'subscribe_at', 'cancel_at'];
    protected $rules = ['service_id' => 'required|integer', 'user_id' => 'required|integer', 'subscribe_at' => 'required'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
