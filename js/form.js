$(document).ready(function () {
    'use strict';

    $.validator.addMethod("password", function (value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/i.test(value);
    }, "Password contains at least 6 characters with uppercase letters, lowercase letters and at least one number.");

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