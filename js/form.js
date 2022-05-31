$(document).ready(function () {
    'use strict';

    $('form[data-validate="true"]').validate({
        errorPlacement: function(error, element) {
            $(element).parent().after(error);
        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).parent().removeClass(errorClass);
        },
    })
});