// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    responsive: "true",
    dom: 'Bfrtilp',
    buttons:[
      { extend: 'excel', text: '<i class="fas fa-file-excel"></i>', className: 'btn btn-success' },
      { extend: 'pdf', text: '<i class="fas fa-file-pdf"></i>', className:  'btn btn-danger' },
      { extend: 'print', text: '<i class="fa fa-print"></i>', className: 'btn btn-info' }
    ]
  });
});