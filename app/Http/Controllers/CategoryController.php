<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Yajra\Datatables\Datatables;
use App\Category;
use App\User;



class CategoryController extends Controller
{
 

  public function index()
    {
        // $posts = Post::All();
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('admin.category',['categories'=> $categories]);
    }

     

    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
    public function getList()
    {
        $categories= Category::query();
        return datatables()->eloquent($categories)
            ->addColumn('action', function($category){
                return '<button data-id="'.$category->id.'" class="btn btn-sm btn-success" data-title="show" data-toggle="modal" data-target="#show" ><i class="fa fa-eye"></i></button>
                        <a href="posts/'.$category->id.'/edit"><button userId="'. $category->id .'" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
                        <button postId="'. $category->id .'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
            })
        // ->addColumn('photo', function($user){
        //     return '<img class="img-fluid" src="'. $user->avatar .'">';
        // })
        ->rawColumns(['action'])
        ->toJson();
    }
    
    // public function create()
    // {
    //     $categories = Category::all();
    //     $users = User::all();
    //     return view('admin.post.create',['categories'=>$categories,'users'=> $users]);
    // }

    public function store(Request $request)
    {
        $data = $request->all();       

        Category::create($data);

        return redirect('admin/categories')->with('flag','Thêm thành công!');
    }

    
    public function show($id)
    {
        $categories = Category::find($id);
         return response()->json($categories);
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
        $post = Categories::find($id);
        $data = $request->all();       

        $post->update($data);

        return redirect('admin/categories')->with('flag','Sửa thành công!');
    }

   
    public function destroy($id)
    {
        Category::where('id',$id)->first()->delete();
        return response()->json(['eror'=>false]);
    }




}

