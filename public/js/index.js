$(document).ready(function() {
    var table = $('#ranktable').DataTable({
        paging: false,
        autoWidth: false,
        searching: false,
        search: [{
            smart: false,
        }],
        info: false,
        order: [
            [12, 'desc']
        ],
        columnDefs: [{
            targets: [0],
            orderable: false,
        }],
        jQueryUI: false
    });

    $('tbody tr').each(function(index) {
        cur = $(this).find('td:nth-child(13)').text();
        next = $(this).next('tr').find('td:nth-child(13)').text();
        if (next.length > 0) { // if next row exists, change next row's height depending on sum difference
            $(this).next().height($(this).next().height() + (cur - next) * 30);
        }
    });

    $('#ranktable tbody').on('mouseleave', 'td', function() {
        $(table.cells().nodes()).removeClass('highlight');
    });

    // on clicking a header to sort, all cells revert to the same default height
    // this function can only be invoked once
    $('thead').one('click', function() {
        $('tbody tr').each(function() {
            //console.log(true);
            $(this).height(37);
        });
    });
});
