$(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
       "ajax": "index",
       "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile_number', name: 'mobile_number'},
            {data: 'location', name: 'location'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});