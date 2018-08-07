<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.user',['users'=> $users]);
    }
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
    public function getList()
    {
        $users= User::query();
        return datatables()->eloquent($users)
            ->addColumn('action', function($user){
                return '<button userId="'.$user->id.'" class="btn btn-sm btn-info" data-title="show" data-toggle="modal" data-target="#show" ><i class="fa fa-eye"></i></button>
                        <button userId="'. $user->id .'" class="btn btn-sm btn-warning" data-title="edit" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>
                        <button userId="'. $user->id .'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
            })
        // ->addColumn('photo', function($user){
        //     return '<img class="img-fluid" src="'. $user->avatar .'">';
        // })
        ->rawColumns(['action'])
        ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();       
        $user =  new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->username=$data['username'];
        $user->password=bcrypt($data['password']);
        $user->save();
        // User::create($data);
        // return response()->json([$data]);
        return view("admin.user.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return response()->json($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        // $user->name=$data['name'];
        // $user->email=$data['email'];
        // $user->username=$data['username'];
        // $user->save();
        $user->update($data);
        return response()->json([$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->first()->delete();
        return response()->json(['eror'=>false]);
    }
}
