<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\PostLike;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Notifications\PostLikeNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('user')->get();

        return view('home', ['posts' => $posts]);
    }

    public function storeLike(Request $request)
    {
        $user = auth()->user();

        $likes = PostLike::where('post_id', $request->post_id)->where('user_id', $user->id)->get();

        if ($likes->isEmpty()) {
            PostLike::create([
                'post_id' => $request->post_id,
                'user_id' => $user->id,
            ]);
        } else {
            Notification::where('data->post_id', $request->post_id)->where('data->user_id', $user->id)->delete();
        }



        /* foreach($likes as $like){
            if($like->post_id == $request->post_id) {
                echo('Encontrado<br>');
                if($like->user_id == 1) {
                    echo('Ya se le dio like<br>');
                } else {
                    echo('Este post no tiene like de este usuario<br>');
                }
            } else {
                $like = PostLike::create([
                    'post_id' => $request->post_id,
                    'user_id' => $user->id,
                ]);
            }
        } */




    }

    public function postLike(Request $request)
    {
        /* $notify = Notification::all();
        $user = auth()->user();
        $post = Post::whereId($request->post_id)->with('user')->first();

        $author = $post->user;

        if ($author) {
            $author->notify(new PostLikeNotification($user, $post));
        } */
    }
}
