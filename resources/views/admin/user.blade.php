@extends('layouts.masteradmin')





@section('content')


 

		<section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>User</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">User</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>

    


	    <!-- Main content -->
	    <section class="content">

	      <!-- Default box -->
	      <div class="card">
	        <div class="card-header">
	          


	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	              <i class="fa fa-times"></i></button>
	          </div>
	          <button class="btn btn-primary" data-title="create" data-toggle="modal" data-target="#create"  style="margin-top:15px;"><i class=" fa fa-plus" style="margin-right:10px"></i>Thêm mới</button>
	        </div>


	        <div class="card-body table-responsive">
              <table id="dataTableUser" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                 
                  <th>Action</th>
              		
                </tr>
                </thead>
                
              </table>
            </div>
	       
	        <!-- /.card-footer-->
	      </div>

	    
	      <!-- /.card -->

	    </section>
    <div class="modal fade" id="show" style="left: 29rem">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
					<h4 class="modal-title">Xem chi tiết</h4>
				</div>
				<div class="modal-body">
					<div class="panel panel-info">
        				<div class="panel-body">
          					<div class="row">
           						<div class="col-md-3 col-lg-3 " align="center"><img src="{{ asset('admin/img/avatar.png') }}" width="100px" height="100px"></div>
           				 		<div class=" col-md-9 col-lg-9 "> 
              						<table class="table table-user-information">
                						<tbody>
                							<tr>
					                        	<td><b>Mã số ID :</b> </td>
					                        	<td id="id"></td>
					                        </tr>
                  							<tr>
						                        <td><b>Họ và tên : </b></td>
						                        <td id="name"></td>
					                      	</tr>
					                      	<tr>
					                        	<td><b>Email : </b></td>
					                        	<td id="email"></td>
					                      	</tr>		                   
				                            <tr>
					                        	<td><b>Username : </b></td>
					                        	<td id="username"></td>
				                      		</tr>
					                    </tbody>
					                </table>                  
            					</div>
          					</div>
        				</div>           
      				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="create" style="left: 29rem">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
					<h4 class="modal-title">New User</h4>
				</div>
				<div class="modal-body">
					<form  method="POST" role="form">
						@csrf
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="name">
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="email">
						</div>

						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="username">
						</div>

						<div class="form-group">
							<label for="">Password</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="password">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary" class="create">Create</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="edit" style="left: 29rem">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
					<h4 class="modal-title">Edit User</h4>
				</div>
				<div class="modal-body">
					<form role="form">
						@csrf
						<!-- <input type="hidden" name="_method" value="put"> -->
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" id="editName" placeholder="Input field" name="name" value="">
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="editEmail" placeholder="Input field" name="email">
						</div>

						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" id="editUserName" placeholder="Input field" name="username">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary" class="update">Update</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer')
	<script src="{{mix('admin/js/jquery.dataTable.js')}}"></script>
    <script src="{{mix('admin/js/jquery.dataTable.bootstrap4.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script >
		$(document).ready(function () {

		    var userTable = $('#dataTableUser').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'users/list',
		        columns: [{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'email', name: 'email' }, { data: 'username', name: 'username' }, { data: 'action', name: 'action' }]
		    });
		 


		$(document).on('click','.btn-danger',function(){
            var user_id= $(this).attr('userId');
           
            
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                type: 'delete',
                url: 'users/' + user_id,
                success:function(response){
                     userTable.ajax.reload();

                }
            })
            swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });
            // })
        });

			$(document).on('click','.btn-danger',function(){
            var user_id= $(this).attr('userId');
            
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                type: 'delete',
                url: 'users/' + user_id,
                success:function(response){
                    table.ajax.reload();
                }
            })
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });
            // })
        });
			$(document).on('click','.btn-info',function(){
				var user_id= $(this).attr('userId');
				$.ajax({

					type: 'GET',
					url: 'users/'+ user_id,
					success: function(response){
						console.log(response);
						$('#id').text(response.id);
						$('#name').text(response.name);
						$('#email').text(response.email);
						$('#username').text(response.username);	
					}
				})
			});
			$(document).on('click','.btn-warning',function(){
				var user_id= $(this).attr('userId');
				$.ajax({
					type: 'GET',
					url: 'users/'+user_id,
					success: function(response){
						console.log(response);
						$('#editName').val(response.name);
						$('#editEmail').val(response.email);
						$('#editUserName').val(response.username);
					}
				})
			});
			$(document).on('click','.create',function(e){
				e.preventDefault();
		        $.ajax({
		            type: 'POST',
		            url: 'users' ,
		            success:function(response){
		                // userTable.ajax.reload();
		                location.reload();
		            }
		        
			    })
			});
			$(document).on('click','.update',function(){
				var user_id= $(this).attr('userId');
		        $.ajax({
		            type: 'PUT',
		            url: 'users/'+ user_id ,
		            success:function(response){
		                userTable.ajax.reload();
		            }
		        
			    })
			});
		  
		});
	</script>
@endsection