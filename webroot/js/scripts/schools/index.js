/**
 * Created by rgabriel on 11.05.2017.
 */
$( document ).ready(function() {

    var data;

    $.ajax({
        type: 'GET', // your request type
        url: baseUrl+'establishments/getList.json',
        success: function (response) {
            $('#establishment-id').select2({
                placeholder: "Select an option",
                data: response.establishments
            }).val(null).trigger("change");
        }
    });

    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 2,
        format: 'yyyy-mm-dd'
    });

    $('.add-subject-trigger').click(function () {
        var modal = $('#modal-add-subject'),
        classid = $(this).data('classid');
        modal.find('#school-class-id').val(classid)

        $.ajax({
            type: 'GET',
            url: baseUrl+'terms/getList.json',
            success: function (response) {

                var termselect = modal.find('#terms-ids');

                termselect.empty();

                $.each(response.results, function(groupName, options) {
                    $.each(options, function(i, option) {
                        var $option = $("<option>", {
                            text: option+" ("+groupName+")",
                            value: i
                        });
                        $option.appendTo('#terms-ids');
                    });
                });

                termselect.material_select();
            }
        });

    });

    $('.add-term-trigger').click(function () {
        var modal = $('#modal-add-term'),
            acid = $(this).data('acid');
        modal.find('#academicyear-id').val(acid)



    });


});