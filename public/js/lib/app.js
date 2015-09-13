$(document).ready(function(){

    var cypher = $('.jumbotron h1 span');

    if( cypher.length > 0 ) {
        cypher.jCypher({
            'start': 10,
            'offset': 5
        });
    }

    $('#delete-racer-btn').click(function(e)
    {
        e.preventDefault();
        $('#racer-name-confirm').html($(this).data('racer-name'));
        $('#confirm-delete-btn').attr('data-url', $(this).attr('href'));
        $('#confirmModal').modal();
    });

    $('#confirm-delete-btn').click(function(e)
    {
        window.location = $(this).data('url');
    });

});
