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
        $('#confirm-delete-racer-btn').attr('data-url', $(this).attr('href'));
        $('#confirmDeleteRacerModal').modal();
    });

    $('#confirm-delete-racer-btn').click(function(e)
    {
        window.location = $(this).data('url');
    });

    $('.delete-race-btn').click(function(e)
    {
        e.preventDefault();
        $('#race-name-confirm').html($(this).data('race-name'));
        $('#confirm-delete-race-btn').attr('data-url', $(this).attr('href'));
        $('#confirmDeleteRaceModal').modal();
    });

    $('#confirm-delete-race-btn').click(function(e)
    {
        window.location = $(this).data('url');
    });

});
