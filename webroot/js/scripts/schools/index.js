/**
 * Created by rgabriel on 11.05.2017.
 */
$( document ).ready(function() {

    var data;

    $.ajax({
        type: 'GET', // your request type
        url: baseUrl+'establishments/list.json',
        success: function (response) {
            $('input.autocomplete').autocomplete({
                data: response.establishments
            });
        }
    });




});