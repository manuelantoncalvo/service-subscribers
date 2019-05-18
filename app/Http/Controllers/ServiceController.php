<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\SubscribeService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class ServiceController extends BaseController
{
    /**
     * Get service list.
     *
     * @return Response
     */

    public function index()
    {
        $services = Service::query()->paginate();

        return response()->json($services);
    }

    /**
     * Get service.
     *
     * @param Int $serviceId
     * @return Response
     */

    public function show($serviceId)
    {
        $service = Service::findOrFail($serviceId);

        return response()->json($service);
    }

    /**
     * Get users (subscribers) from service.
     *
     * @param Int $serviceId
     * @return Response
     */

    public function getUsers($serviceId)
    {
        $users = Service::findOrFail($serviceId)->users()->paginate();

        return response()->json($users);
    }

    /**
     * Add an user (subscriber) to service.
     *
     * @param Request $request
     * @param Int $serviceId
     * @return Response
     */

    public function addUser(Request $request, $serviceId)
    {
        $request->validate(['user_id' => 'required']);

        $service = Service::findOrFail($serviceId);
        $userId = $request->get('user_id');
        $user = User::findOrFail($userId);

        $subscribeService = new SubscribeService($service, $user);
        $subscribeService->subscribeUser();

        return response()->json($service->load('users'));
    }

    /**
     * Remove an user (subscriber) from service.
     *
     * @param Int $serviceId
     * @param Int $userId
     * @return Response
     */

    public function removeUser($serviceId, $userId)
    {
        $user = User::findOrFail($userId);
        $service = Service::findOrFail($serviceId);

        $subscribeService = new SubscribeService($service, $user);
        $subscribeService->unsubscribeUser();

        return response()->json($service->load('users'));
    }

    /**
     * Ge a user (subscriber) associated to the service.
     *
     * @param Int $serviceId
     * @param Int $userId
     * @return Response
     */

    public function getUser($serviceId, $userId)
    {
        $service = Service::findOrFail($serviceId);
        $user = $service->users()->where('id', $userId)->firstOrFail();

        return response()->json($user);
    }
}
