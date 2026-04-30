$(document).ready(function(){
    // Only initialize #datatable if it's not on patient_queue page
    if(!$('#selection-datatable').length && !$('.queue-wrapper').length){
        $("#datatable").DataTable();
    }
    var a=$("#datatable-buttons").DataTable({lengthChange:!1,buttons:["copy","excel","pdf"]});
    $("#key-datatable").DataTable({keys:!0});
    // Only initialize #selection-datatable if it's not on patient_queue page
    if(!$('.queue-wrapper').length){
        $("#selection-datatable").DataTable({select:{style:"multi"}});
    }
    a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
});