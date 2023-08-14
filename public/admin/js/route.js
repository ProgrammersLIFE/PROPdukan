$(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
       "ajax": "index",
       "columns": [
            {data: 'id', name: 'id'},
            {data: 'label', name: 'label'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
 
    getDelete = ($id) => {
      var conf = confirm('Are You Sure?');
          if(!conf){
              return false;
          }

          $.ajax({
            type: "get",
            url: "{{ route('routes/delete)}}/" + $id,
            dataType: "dataType",
            success: function (response) {
              console.log(response);
            }
          });
    }