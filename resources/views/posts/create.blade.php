@extends('layouts.masteradmin')

@section('content')
	<div class="content-header">
	    <h1>
      		New Post
		</h1>
		<ol class="breadcrumb">
		    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li class="active">Post</li>
		    <li class="active">New Post</li>
		</ol>      
    </div>
	<div class="content">
		<form action="{{asset('')}}admin/posts" method="POST" role="form" enctype="multipart/form-data">
			@csrf
			<div class="col-md-8">            
	            <div class="box box-primary">
	              	<div class="box-body">
	              		<div class="form-group">
							<label for="">Title</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="title">
						</div>
	              	</div>	              	
	              	<div class="box-body">
	              		<div class="form-group">
							<label for="">Description</label>
							<textarea id="editor1" class="form-control" name="description" placeholder="Input field" rows="2"></textarea>
						</div>
	              	</div>
	              	<div class="box-body">
	              		<div class="form-group">
							<label for="">Content</label>
							<textarea id="editor2" class="form-control" name="content" placeholder="Input field" rows="3"></textarea>
						</div>
	              	</div>
	              	
		        </div>           
          	</div>
          	<div class="col-md-4">
          		<div class="box box-primary">
	          		<div class="box-body">
	              		<div class="form-group">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="slug">
						</div>
	              	</div>
	              	<div class="box-body">
	              		<div class="form-group">
		                    <label for="exampleInputFile">Thumbnail</label>
		                    <div class="input-group">
		                      	<div class="custom-file">
			                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">			                        
		                      	</div>
		                    </div>
		                </div>
	              	</div>
              	</div> 
              	<div class="box box-primary">
	          		<div class="box-body">
	              		<div class="form-group">
							<label for="">User_id</label>
							<select name="user_id" id="input"  size="3" multiple class="form-control" required="required" >
								@foreach($users as $user)
									<option checked value="{{$user->id}}">{{$user->id}}</option>
								@endforeach								
							</select>
						</div>
	              	</div>
	              	<div class="box-body">
	              		<div class="form-group">
							<label for="">Category_id</label>
							<select name="category_id" id="input" size="3" multiple class="form-control" required="required" >
								@foreach($categories as $category)
									<option checked value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
	              	</div>
	              	<button type="submit" class="btn btn-primary form-control">Create</button>
              	</div>              	
          	</div>

		</form>		
	</div>
@endsection

@section('footer')
	<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
	<script>
	  	$(function () {
	    	CKEDITOR.replace('editor1')
	    	CKEDITOR.replace('editor2')
	    	//bootstrap WYSIHTML5 - text editor
	    	$('.textarea').wysihtml5()
		 })
	</script>
@endsection