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
                <li class="breadcrumb-item active">Post</li>
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
            <a href="{{asset('')}}admin/posts/create"><button class="btn btn-primary" style="margin-top:15px;"><i class=" fa fa-plus" style="margin-right:10px"></i>Thêm mới</button></a>
          </div>
        

          <div class="card-body table-responsive">
              <table id="dataTablePost" class="table table-bordered table-striped">
               <thead>
                            <tr>
                                <th style="text-align: center;border-bottom:none">ID</th>
                                <th style="text-align: center;border-bottom:none">Title</th>
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
                <p id="slug"></p>
                <img id="img" width="400" height="350" style="margin-left: -15px" src="">
                <h1 id="title"></h1>
                <p id="desception">""</p>
                <p id="content"></p>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script >
    $(document).ready(function () {  

        var postTable = $('#dataTablePost').DataTable({
          processing: true,
          serverSide: true,
          ajax: 'posts/list',
          columns: [{ data: 'id', name: 'id' }, { data: 'title', name: 'title' }, { data: 'action', name: 'action' }]
        });
   
       $(document).on('click','.btn-danger',function(){
            var post_id= $(this).attr('postId');
            
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
                url: 'posts/' + post_id,
                success:function(response){
                    postTable.ajax.reload();
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

      $('#qqq-table').on('click','.btn-danger',function(){
            var post_id= $(this).attr('postId');
            
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
                url: 'posts/' + user_id,
                success:function(response){
                    postTable.ajax.reload();
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
      $(document).on('click','.btn-success',function(){
        var id = $(this).data('id');

        $.ajax({
          type: 'GET',
          url: 'posts/'+id,
          success: function(response){
            $('#slug').text('Link:duong.stag/blog/post/'+response.slug);    
            document.getElementById("img").src = response.thumbnail;    
            $('#title').text(response.title); 
            $('#desception').text(response.description);
            $('#content').text(response.content);   
          }
        })
      })
          

    });
  </script>
@endsection
