var form_input = $(".city-find-form--input")
var title = $('.city-find-page-title');
var spotify_login = $('.city-find-page-connect');
var quotes = $('.deep-quotes');
var search_form = $('.city-find-form--wrapper');
var elems_to_move = [title, spotify_login, search_form, quotes];
var arr_length = elems_to_move.length;

$(".city-find-form").bind("submit", moveElems);
form_input.bind("change", isEmpty);

function moveElems() {
    quotes.hide()
    if (!elems_to_move[0].hasClass('hide')) {
        for (i = 0; i < arr_length; i++) {
            elems_to_move[i].removeClass('show');
            elems_to_move[i].addClass('hide');
        }
    }
    form_input.on("keyup", isEmpty);
}

function isEmpty() {
    console.log("sadf")
    if (form_input.val()==""){
        for (i = 0; i < arr_length; i++) {
            elems_to_move[i].removeClass('hide');
            elems_to_move[i].addClass('show');
        }
        quotes.show()
    }
}

