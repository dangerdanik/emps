$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        "ordering": true, // false to disable sorting (or any other option)
        "paging": true,
        "lengthMenu": [[10, 5, 3, -1], [10, 5, 3, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
});
