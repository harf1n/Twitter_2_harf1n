<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

    $incomingFields['title'] = strip_tags($incomingFields['title']);
    $incomingFields['body'] = strip_tags($incomingFields['body']);
    $incomingFields['user_id'] = auth()->id();
    Post::create($incomingFields);
    return redirect('/');
    }

    public function showEditScreen(Post $post){
        if(auth()->id() !== $post['user_id']){
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(post $post, request $request){
        if(auth()->id() === $post['user_id']){
            $incomingFields = $request->validate([
                'title' => 'required',
                'body' => 'required'
            ]);

            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);

            $post->update($incomingFields);
        }
        return redirect('/');
    }

    public function deletePost(Post $post){
        if(auth()->id() === $post['user_id']){
            $post->delete();
        }
        return redirect('/');
    }
}