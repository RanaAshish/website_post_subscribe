<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebsiteSubscription;
use App\Repositories\WebsiteSubscription\WebsiteSubscriptionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteSubscriptionController extends Controller
{
    public function __construct(WebsiteSubscriptionInterface $subscriptionRepo)
    {
        $this->subscriptionRepo = $subscriptionRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "website_id" => "required",
            "email" => "required",
        ]);

        if ($validator->fails()) {
            return responseFormat($validator->errors(), null, 400);
        }

        $user_id = User::where('email', $request->email)->pluck('id')->first();
        if(!$user_id){
            $user_id = User::create(['email' => $request->email])->id;
        }
        $subscribe = WebsiteSubscription::where(['user_id'=>$user_id,'website_id'=>$request->website_id])->first();
        if($subscribe){
            return responseFormat('You are already subscribe!', null, 400);
        }
        $request->user_id = $user_id;
        $post = $this->subscriptionRepo->store($request);
        if (!$post) {
            return responseFormat('User not subscribe!', null, 400);
        }
        return responseFormat('User subscribe!', null, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteSubscription  $websiteSubscription
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteSubscription $websiteSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteSubscription  $websiteSubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteSubscription $websiteSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteSubscription  $websiteSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteSubscription $websiteSubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteSubscription  $websiteSubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteSubscription $websiteSubscription)
    {
        //
    }
}
