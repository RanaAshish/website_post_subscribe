<?php

namespace App\Repositories\WebsiteSubscription;

use App\Models\User;
use App\Models\WebsiteSubscription;

class WebsiteSubscriptionRepository implements WebsiteSubscriptionInterface
{
    public function index($request)
    {
        return true;
    }

    public function show($id)
    {
        return true;
    }

    public function store($request)
    {
        $WebsiteSubscription = WebsiteSubscription::create([
            'user_id' => $request->user_id,
            'website_id' => $request->website_id,
        ]);

        return $WebsiteSubscription ? true : false;
    }

    public function update($request, $id)
    {
        return true;
    }

    public function destroy($id)
    {
        return true;
    }
}
