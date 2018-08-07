@extends('layouts.masteradmin')


@section('content')
 <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

 
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
            <a href="{{asset('')}}admin/categories/create"><button class="btn btn-primary" style="margin-top:15px;"><i class=" fa fa-plus" style="margin-right:10px"></i>Thêm mới</button></a>
          </div>
        

          <div class="card-body table-responsive">
              <table id="dataTableCategory" class="table table-bordered table-striped">
               <thead>
                            <tr>
                                <th style="text-align: center;border-bottom:none">ID</th>
                                <th style="text-align: center;border-bottom:none">Name</th>
                                <th style="text-align: center;border-bottom:none">Slug</th>
                                <th style="text-align: center;border-bottom:none">Descripsion</th>
                                <th style="text-align: center;border-bottom:none">Action</th>
                            </tr>
                        </thead>   
                
              </table>
            </div>
         
          <!-- /.card-footer-->
        </div>
       


      
        <!-- /.card -->

      </section>
       <div class="row modal fade" id="show" style="left: 29rem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                
                <h4 class="modal-title">Xem chi tiết</h4>
              </div>
              <div class="modal-body">
                <p id="id"></p>
                
                <h1 id="name"></h1>
                <p id="slug"></p>
                <p id="description"></p>
                
              </div>
              <div class="modal-footer">
                <button type"400tton" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  

@endsection
@section('footer')
    <script src="{{mix('admin/js/jquery.dataTable.js')}}"></script>
    <script src="{{mix('admin/js/jquery.dataTable.bootstrap4.js')}}"></script>
      <script >
    $(document).ready(function () {  

        var postTable = $('#dataTableCategory').DataTable({
          processing: true,
          serverSide: true,
          ajax: 'categories/list',
          columns: [{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'slug', name: 'slug' }, { data: 'description', name: 'description' }, { data: 'action', name: 'action' }]
        });
        $(document).on('click','.btn-danger',function(){
            var post_id= $(this).attr('postId');

            $.ajax({
                type: 'delete',
                url: 'posts/' + post_id,
                success:function(response){
                    postTable.ajax.reload();
                }
            
            })
      });
      $(document).on('click','.btn-success',function(){
        var category_id= $(this).attr('data-id');
        
        $.ajax({
          type: 'GET',
          url: 'categories/'+ category_id,
          success: function(response){
            console.log(response);
            $('#id').text('ID:'+response.id);
            $('#name').text('Name:'+response.name);
            $('#slug').text('Slug:'+response.slug);
            $('#description').text('Description:'+response.description);
            
          }
        })
      });
          

    });
  </script>
@endsection
