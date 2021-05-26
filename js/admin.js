$(document).ready(function () {
    $('#dtAdminExample').DataTable({
        "ordering": true, // false to disable sorting (or any other option)
        "paging": false,
        //  "lengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
});