<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->paginate(4);

        foreach ($posts as $post) {
            if ($post->cover) {
                $post->cover = asset('storage/' . $post->cover);
            } else {
                $post->cover = asset('img/no_image.jpg');
            }
        }

        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('slug', $id)->first();

        if ($posts) {
            return response()->json([
                'success' => true,
                'results' => $posts
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'not found'
            ]);
        }
    }


}
