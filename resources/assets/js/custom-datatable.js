$(document).ready(function() {

    $('#project-todos').DataTable({
        "order": [[ 1, 'asc' ]],
        "pageLength": 100
    });

    $('#all-todos').DataTable({
        "order": [[ 1, 'asc' ]],
        "pageLength": 100
    });
} );