<?php

namespace App\Repositories;

use App\Models\ServiceUser;
use Carbon\Carbon;

class SubscribersRepository
{

    public static function getCommandReportFor(Carbon $date)
    {
        $initialDate = $date->startOfDay()->toDateTimeString();
        $endDate = $date->endOfDay()->toDateTimeString();

        $new_subscriptions_in_day = ServiceUser::whereBetween('subscribe_at', [$initialDate, $endDate])->count();

        $cancel_subscriptions_in_day = ServiceUser::whereBetween('subscribe_at', [$initialDate, $endDate])
                                        ->withTrashed()->where('cancel_at', '!=', null)->count();

        $total_active_subscriptions_at_date = ServiceUser::where('subscribe_at', '<=', $date->endOfDay())->where('cancel_at', null)->count();

        return ['new_subscriptions_in_day' => $new_subscriptions_in_day,
                'cancel_subscriptions_in_day' => $cancel_subscriptions_in_day,
                'total_active_subscriptions_at_date' => $total_active_subscriptions_at_date];
    }

}