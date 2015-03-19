$(document).ready(function() {

    $('#project-todos').DataTable({
        "order": [[ 1, 'asc' ]]
    });

    $('#all-todos').DataTable({
        "order": [[ 1, 'asc' ]]
    });
} );