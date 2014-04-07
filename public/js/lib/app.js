$(document).ready(function(){

    var cypher = $('.jumbotron h1 span');

    if( cypher.length > 0 ) {
        cypher.jCypher({
            'start': 10,
            'offset': 5
        });
    }


});
