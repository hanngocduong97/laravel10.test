<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; // bảng posts trong database
    protected $fillable = [
    		'title', 
    		'thumbnail', 
    		'description', 
    		'content',
    		'slug',
    		'user_id',
    		'category_id',
    		'view_count'
    	]; // một mảng tên các cột trong bảng posts ở database
    	// không cần thêm các cột như id, created_at, updated_at, deleted_at vào
    	// vì nó là những cột mặc định

    public function category(){
        return $this->belongTo('App\Category');
    }
    public static function getAll(){
        return self::orderBy('id','desc');
        // return self::get();
    }

}
