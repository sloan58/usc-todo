$(document).ready(function() {

    $('#project-todos').DataTable({
        "order": [[ 1, 'asc' ]],
        "pageLength": 50
    });

    $('#all-todos').DataTable({
        "order": [[ 1, 'asc' ]],
        "pageLength": 50
    });
} );