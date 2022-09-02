<?php

namespace App\Repositories\Post;

use App\Models\Post;

class PostRepository implements PostInterface
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
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ]);

        return $post;
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
