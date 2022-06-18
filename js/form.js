$(document).ready(function () {
    'use strict';

    $.validator.addMethod("password", function (value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/i.test(value);
    }, "Mật khẩu chứa ít nhất 6 ký tự gồm chữ hoa, chữ thường và ít nhất một số.");

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