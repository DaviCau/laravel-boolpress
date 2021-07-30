<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::all();
        $posts = Post::paginate(3);

        // $result = [
        //     'success' => true,
        //     'posts' => $posts
        // ];

        return response()->json($posts);
    }
}