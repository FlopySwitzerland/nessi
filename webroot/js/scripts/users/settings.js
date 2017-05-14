/**
 * Created by rgabriel on 13.05.2017.
 */
$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 25, // Creates a dropdown of 15 years to control year
        max: true
    });

    $('#changePwdForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: baseUrl + "users/change-pwd.json",
            data: $("#changePwdForm").serialize(), // serializes the form's elements.
            success: function(data){
                if(data.results.success){

                }else{

                    $.each(data.results.msg, function( key, value ) {

                    });
                }
                console.log(data);
            },
            fail: function (data) {
                console.log(data);
            }
        });
    });
});