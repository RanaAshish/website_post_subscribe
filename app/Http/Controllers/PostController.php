<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Post\PostInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct(PostInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|string",
            "description" => "required|string",
            "website_id" => "required",
        ]);

        if ($validator->fails()) {
            return responseFormat($validator->errors(), null, 400);
        }

        $post = $this->postRepo->store($request);
        if (!$post) {
            return responseFormat('Post Not Created!', null, 400);
        }

        $details['title'] = $post->title;
        $details['description'] = $post->description;
        $details['website_id'] = $request->website_id;
        dispatch(new \App\Jobs\SendPostJob($details));

        return responseFormat('Post Created!', null, 201);
    }

}
