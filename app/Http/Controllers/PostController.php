<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check()) {
            return redirect('login');
        }

        $posts = Post::active()->get();
        $view_data = [
            'posts' => $posts,            
        ];

        return view('posts.index', $view_data);       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        
        $title = $request->input('title');
        $content = $request->input('content');

        $post = Post::create([
            'title' => $title,
            'content' => $content,
        ]);        

        \Mail::to(Auth::user()->email)->send(new BlogPosted($post));

        $this->notify_telegram($post);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        
        $post = Post::where('id', $id)->first();
        $comments = $post->comments()->get();
        $total_comments = $post->total_comments();

        $view_data = [
            'post'    => $post,
            'comments' => $comments,
            'total_comments' => $total_comments,           
        ];
        return view('posts.show', $view_data); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        
        $post = Post::where('id', $id)->first();
        $view_data = [
            'post' => $post            
        ];
        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        
        $title = $request->input('title');
        $content = $request->input('content');

        Post::where('id', $id)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        
        Post::where('id', $id)->delete();
                
        return redirect("posts");
    }

    private function notify_telegram($post)
    {
        $api_token = "6454912823:AAHESem5nzUEHFSmBkUHKu4PcMl_yhc7G80";
        $url = "https://api.telegram.org/bot{$api_token}/sendMessage";
        $chat_id = -4069295755;
        $content = "Ada Postingan baru nih di blog kamu, dengan judul: <strong>\"{$post->title}\"</strong>";

        $data = [
            'chat_id' => $chat_id,
            'text'   => $content,
            'parse_mode' => "HTML"
        ];
        Http::post($url, $data);
    }
}
