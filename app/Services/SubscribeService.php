<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\User;
use App\Models\ServiceUser;

class SubscribeService
{
    public $service;
    public $user;

    public function __construct(Service $service, User $user)
    {
        $this->service = $service;
        $this->user = $user;
    }

    public function subscribeUser()
    {
        if(!$this->userAlreadySubscribed())
        {
            $this->service->users()->attach($this->user, ['subscribe_at' => Carbon::now()]);
        }
    }

    public function unsubscribeUser()
    {
        if($this->userAlreadySubscribed())
        {
            $this->service->users()->detach($this->user);
        }
    }

    public function userAlreadySubscribed()
    {
        return ServiceUser::where(['user_id' => $this->user->id, 'service_id' => $this->service->id, 'cancel_at' => null])->count() > 0;
    }

}