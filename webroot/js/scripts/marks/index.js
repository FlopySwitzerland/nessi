/**
 * Created by rgabriel on 13.05.2017.
 */
$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 2,
        format: 'yyyy-mm-dd'
    });


    $('#subject-id').change(function () {
        $.ajax({
            type: 'GET', // your request type
            url: baseUrl+'terms/list.json',
            data: "",
            success: function (response) {

            }
        });
        
    })

    
});