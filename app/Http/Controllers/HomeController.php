<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{

    /*public function __construct(){
        $this->middleware('auth');
    }*/
    
    public function __invoke(){

        if(auth()->user()){
            //Obtener a quienes seguimos
            $ids = auth()->user()->followings->pluck('id')->toArray();
            $posts = Post::whereIn('user_id',$ids)->latest()->paginate(12);
            $users = User::orderBy('id','DESC')->where('id','!=',auth()->user()->id)->get();
        }
        else{
            $posts = Post::latest()->paginate(12);
            $users = User::orderBy('id','DESC')->get();
        }


        return view('home',[
            'posts' => $posts,
            'users' => $users
        ]);


        return view('home'); 
    }
}
