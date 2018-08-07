@extends('layouts.masteradmin')

@section('content')
	 <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Post</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">ADD Post</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
	<div class="content">
		<form action="{{asset('')}}admin/posts" method="POST" role="form" enctype="multipart/form-data">
			@csrf
			<div class="row">
			<div class="col-md-8">  
			         
	            <div class="box box-primary">
	              	<div class="box-body">
	              		<div class="form-group">
							<label for="">Title</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="title">
							@if ($errors->has('title'))
							    <p style="color: red;">{{$errors->first('title')}}</p>
							@endif
						</div>
	              	</div>	              	
	              	<div class="box-body">
	              		<div class="form-group">
							<label for="">Description</label>
							<textarea id="editor1" class="form-control" name="description" placeholder="Input field" rows="2"></textarea>
							@if ($errors->has('description'))
							    <p style="color: red;">{{$errors->first('description')}}</p>
							@endif
						</div>
	              	</div>
	              	<div class="box-body">
	              		<div class="form-group">
							<label for="">Content</label>
							<textarea id="editor2" class="form-control" name="content" placeholder="Input field" rows="3"></textarea>
							@if ($errors->has('content'))
							    <p style="color: red;">{{$errors->first('content')}}</p>
							@endif
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
							@if ($errors->has('slug'))
							    <p style="color: red;">{{$errors->first('slug')}}</p>
							@endif
						</div>
	              	</div>
	              	<div class="box-body">
	              		<div class="form-group">
		                    <label for="exampleInputFile">Thumbnail</label>
		                    <div class="input-group">
		                      	<div class="custom-file">
			                        <input type="imge"  class=" form-control" id="thumbnail" name="thumbnail">			                        
		                      	</div>
		                    </div>
		                </div>
	              	</div>
              	</div> 
              	<div class="box box-primary">
	          		<div class="box-body">
	              		<div class="form-group">
							<label for="">User</label>
							<select name="user_id" id="input"  size="3" multiple class="form-control" required="required" >
								@foreach($users as $user)
									<option checked value="{{$user->name}}">{{$user->name}}</option>
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