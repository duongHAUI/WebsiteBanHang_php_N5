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

setInputActive();

$(document).ready(function () {
    'use strict';

    inputSelector.focus(function () {
        setInputActive();
        $(this).parent().addClass('active')
    })

    inputSelector.blur(function () {
        setInputActive();
    })
})