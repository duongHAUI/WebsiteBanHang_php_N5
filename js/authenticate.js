$(document).ready(function () {
    'use strict';

    const inputSelector = $('.form-container input');

    function setInputActive() {
        inputSelector.each(function () {
            const value = $(this).val();
            if (value.trim() !== '') {
                $(this).parent().addClass('active');
            } else {
                $(this).parent().removeClass('active');
            }
        });
    }

    inputSelector.focus(function () {
        setInputActive();
        $(this).parent().addClass('active')
    })

    inputSelector.blur(function () {
        setInputActive();
    })
})