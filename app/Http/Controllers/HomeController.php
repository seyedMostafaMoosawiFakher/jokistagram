<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

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
        dd("home controller");

$joke = Joke::find(33);
$likes= $joke->likes;
        dd($likes);



        dd('home controller');
        Like::create([
            'joke_id'=>33,
            'user_id'=>1,

//            'title' => $request->title,
//            'body' => $request->body,
//            'status' => 1,
//            'user_id' => $request->user_id,
        ]);

        dd('like created');
        $user = auth()->user();
        $joke = $user->jokes;
        $userofjoke = $joke->first()->user->name;
//        dd($user);
        dd($userofjoke, "hi");
        dd($joke);

        return view('home');
    }
}
