/**
 * Created by rgabriel on 13.05.2017.
 */
$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 25, // Creates a dropdown of 15 years to control year
        max: true
    });
});