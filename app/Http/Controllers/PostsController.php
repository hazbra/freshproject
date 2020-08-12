<?php

namespace App\Http\Controllers;

use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
//        $posts = [
//            'my-first-post' => 'Hello, this is my first blog post',
//            'my-second-post' => 'Now i am getting the hang of this blogging thing.'
//        ];

//        $post = DB::table('posts')->where('slug', $slug)->first();

//        $post = Post::where('slug', $slug)->firstOrfail();
//
//        return view('post', [
//            'post' => $post
//        ]);

        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
