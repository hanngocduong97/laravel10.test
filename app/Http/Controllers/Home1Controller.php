<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class Home1Controller extends Controller
{
    public function index(){
        $posts  = Post::All(); // lấy tất cả bài viết bằng câu lệnh hàm all()

        // return view('index',[
        //  'posts' => $posts // dữ liệu được truyền qua view bằng biến posts
        // ]);
        
        return view('index',['posts'=> $posts]);
    }
}
