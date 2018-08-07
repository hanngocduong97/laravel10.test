<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use datatables;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts  = Post::All(); // lấy tất cả bài viết bằng câu lệnh hàm all()

        // return view('index',[
        //  'posts' => $posts // dữ liệu được truyền qua view bằng biến posts
        // ]);
        
        return view('index',['posts'=> $posts]);
    }
    
    public function list()
    {
        return view('admin/index');
    }

   

}
 //  $users = User::query();

        // return datatables()->eloquent($users)
        //             ->addColumn('action', function() {
        //                 return '<button class="btn btn-sm btn-success">Show</button>
        //                         <button class="btn btn-sm btn-warning">Edit</button>
        //                         <button class="btn btn-sm btn-danger">Delete</button>';
        //             })
        //             ->toJson();
