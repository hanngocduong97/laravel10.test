<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Yajra\Datatables\Datatables;
use App\Category;
use App\User;



class PostController extends Controller
{
 

  public function index()
    {
        // $posts = Post::All();
        $posts = Post::orderBy('id', 'DESC')->get();

        return view('admin.list',['posts'=> $posts]);
    }

     

    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
    public function getList()
    {
        $posts= Post::query();
        return datatables()->eloquent($posts)
            ->addColumn('action', function($post){
                return '<button data-id="'.$post->id.'" class="btn btn-sm btn-success showbill" data-title="show" data-toggle="modal" data-target="#show" ><i class="fa fa-eye"></i></button>
                        <a href="posts/'.$post->id.'/edit"><button userId="'. $post->id .'" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
                        <button postId="'. $post->id .'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
            })
        // ->addColumn('photo', function($user){
        //     return '<img class="img-fluid" src="'. $user->avatar .'">';
        // })
        ->rawColumns(['action'])
        ->toJson();
    }
    
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.post.create',['categories'=>$categories,'users'=> $users]);
    }

    public function store(Request $request)
    {
        $data = $request->all();       

        Post::create($data);

        return redirect('admin/posts')->with('flag','Thêm thành công!');
    }

    
    public function show($id)
    {
        $posts = Post::find($id);
         return response()->json($posts);
    }

  
    public function edit($id)
    {
        $categories = Category::all();
        $users = User::all();
        $posts = Post::all();
        foreach ($posts as $post) {
            if($post->id == $id){
                return view('admin.post.edit',['categories'=>$categories,'users'=> $users,'post'=>$post]);
            }
        }
        
    }

   
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $data = $request->all();       

        $post->update($data);

        return redirect('admin/posts')->with('flag','Sửa thành công!');
    }

   
    public function destroy($id)
    {
        Post::where('id',$id)->first()->delete();
        return response()->json(['eror'=>false]);
    }




}

