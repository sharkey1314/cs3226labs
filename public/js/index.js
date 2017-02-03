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

    $('#ranktable tbody').on('mouseleave', 'td', function() {
        $(table.cells().nodes()).removeClass('highlight');
    });

    // override rows with gold, silver, bronze, and lowest categories
    var sumsArray = table
        .columns(12)
        .data()
        .eq(0) // Reduce the 2D array into a 1D array of data
        .unique() // Reduce to unique values
        .map(Number) // Parse to Number array
        .sort(function(a, b) {
            return b - a;
        });
    firstScore = sumsArray[0];
    secondScore = sumsArray[1];
    thirdScore = sumsArray[2];
    lastScore = sumsArray[sumsArray.length - 1];
    $('tbody tr').each(function(index) {
        cur = $(this).find('td:nth-child(13)').text();
        next = $(this).next('tr').find('td:nth-child(13)').text();
        if (next.length > 0) { // if next row exists, change next row's height depending on sum difference
            $(this).next().height($(this).next().height() + (cur - next) * 30);
        }

        // add gold, silver, bronze, and lowest classes for highlighting
        if (cur == lastScore) {
            $(this).addClass('lowest');
        } else if (cur == firstScore) {
            $(this).addClass('gold');
        } else if (cur == secondScore) {
            $(this).addClass('silver');
        } else if (cur == thirdScore) {
            $(this).addClass('bronze');
        }
    });

    // find highest value of each column, highlighting cells which have that value within the column
    for (i = 4; i < 12; i++) {
        var highest = table
            .columns(i)
            .data()
            .eq(0)
            .map(Number)
            .sort(function(a, b) {
                return b - a;
            })[0]; // collecting a column's cell values, sorting and selecting the maximum
        for (j = 0; j < $('tbody tr').length; j++) { // iterating through every cell in the column
            cur = table.cell(j, i).data();
            if (cur == highest)
                var cell = table.cell(j, i).node();
                $(cell).addClass('highlighted');
        };
    };

    // on clicking a header to sort, all cells revert to the same default height
    // this function can only be invoked once
    $('thead').one('click', function() {
        $('tbody tr').each(function() {
            //console.log(true);
            $(this).height(37);
        });
    });
});
