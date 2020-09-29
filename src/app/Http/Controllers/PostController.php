<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {    //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            if (!$user) {
                return response()->json(['message' => 'user_not_found'], 404);
            } else {
                if($user->can('create', Post::class)) {
                    $title = $request->input('title');
                    $content = $request->input('content');

                    $post = Post::create([
                        'title' => $title,
                        'content' => $content,
                        'user_id' => $user->id
                    ]);

                    return response()->json(['created' => $post], 200);
                }
                else {
                    return response()->json(['error' => 'You cannot create that resource'], 401);
                }
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try {
            $user = auth()->user();

            if (!$user) {
                return response()->json(['message' => 'user_not_found'], 404);
            } else {
                if($user->can('update', $post)) {
                    $post->title = $request->input('title');
                    $post->content = $request->input('title');
                    $post->save();
                    return response()->json(['updated' => $post], 200);
                }
                else {
                    return response()->json(['error' => 'You cannot update that resource'], 401);
                }
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        try {
            $user = auth()->user();

            if (!$user) {
                return response()->json(['message' => 'user_not_found'], 404);
            } else {
                if($user->can('delete', $post)) {
                    Post::where('id', $post->id)->delete();
                    return response()->json(['deleted_id' => $post->id], 200);
                }
                else {
                    return response()->json(['error' => 'You cannot delete that resource'], 401);
                }
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
