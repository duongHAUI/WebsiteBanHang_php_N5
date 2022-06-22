$(document).ready(function () {
    'use strict';

    $("[data-tooltip='true']").tooltip();

    const cancelReasonModal = $('#cancel-reason-modal');

    const updateOrderStatus = ({status, order_id, cancel_reason = null}) => {
        $.ajax({
            url: 'update-order-status.php',
            method: 'post',
            data: {status, order_id, cancel_reason},
            beforeSend: function () {
                $('.page-loading').show();
            },
            dataType: 'json'
        }).done(result => {
            if (result.status === 200) {
                let statusText = '<div class="status-text">';
                statusText += `<span class="badge badge-${result.data.variant}">${result.data.label}</span>`;
                if (parseInt(status) === cancelledStatus) {
                    statusText += `<br /><strong>Lý do: </strong> ${cancel_reason}`;
                }
                statusText += '</div>';

                $(`tr[data-id="${order_id}"] .status-column .status-text`)
                    .replaceWith(statusText)
                    .show();
                $(`tr[data-id="${order_id}"] .status-column div.change-order-status-form`).hide();
                $(`tr[data-id="${order_id}"] .status-column select`).val(status);
                $(`tr[data-id="${order_id}"] .status-column input.old-status-id`).val(status);
                $.notify(result.message, 'success');
                cancelReasonModal.modal('hide');
            }
        }).fail(error => {
            console.log(error)
        }).always(() => {
            $('.page-loading').hide();
        })
    }

    $('.status-column').dblclick(function () {
        $(this).parents('tr').siblings().find('div.status-text').show();
        $(this).parents('tr').siblings().find('div.change-order-status-form').hide();

        $(this).find('div.status-text').hide();
        $(this).find('div.change-order-status-form').show();
    });

    $("select[name='order-status']").change(function () {
        const status = $(this).val();
        const order_id = $(this).parents('tr').data('id');

        if (parseInt(status) === cancelledStatus) {
            cancelReasonModal.find("input[name='order_id']").val(order_id);
            cancelReasonModal.find("input[name='status']").val(status);
            cancelReasonModal.find("input[name='cancel_reason']").val("");

            cancelReasonModal.modal('show');
            return;
        }

        updateOrderStatus({status, order_id})
    });

    cancelReasonModal.on('hide.bs.modal', function () {
        const orderId = $(this).find("input[name='order_id']").val();

        const el = $(`tr[data-id='${orderId}']`);

        el.find('.status-text').show();
        el.find("select[name='order-status']").val(el.find(".status-column input.old-status-id").val());
        el.find(".status-column div.change-order-status-form").hide();
    });

    $('.btn-close-form').click(function () {
        const el = $(this).parents('.status-column');

        el.find('.status-text').show();
        el.find("select[name='order-status']").val(el.find("input.old-status-id").val());
        el.find("div.change-order-status-form").hide();
    });

    cancelReasonModal.find("form[data-validate='true']").validate({
        submitHandler: function (form) {
            const formData = $(form).serializeArray().reduce((acc, cur) => {
                acc[cur.name] = cur.value;
                return acc;
            }, {});
            updateOrderStatus(formData);
        }
    });
});