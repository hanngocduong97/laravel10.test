$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        // ajax:' {!! route('admin.users') !!}',
        ajax:' users/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action' }
        ]
    });
     $('#showuser').click(function(){
                $('#detail').modal('show');
                var id = $(this).dataid('id');
                $.ajax({
                    type: 'get',
                    url:'{{asset("")}}user/' + id,
                    success: function(response){
                         $('#id').text(response.id);
                         $('#name').text(response.name);
                         $('#email').text(response.email);
                         $('#createdat').text(response.createdat);
                         $('#updatedat').text(response.updatedat);
                    }

                });
            });
  
});
// $(function() {
//           $('#showuser').click(function(){
//                 $('#show').modal('show');
//                 // var id = $(this).data('id');
//                 // $.ajax({
//                 //     type: 'get',
//                 //     url:'{{asset("")}}user/' + id,
//                 //     success: function(response){
//                 //          $('#id').text(response.id);
//                 //          $('#name').text(response.name);
//                 //          $('#email').text(response.price);
//                 //          $('#createdat').text(response.createdat);
//                 //          $('#updatedat').text(response.updatedat);
//                 //     }

//                 // });
//             });
//    });