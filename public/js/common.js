$(document).ready(function() {
    var url = window.location.pathname;
    $('.nav > li > a[href="'+ url +'"]').parent().addClass('active');
});
