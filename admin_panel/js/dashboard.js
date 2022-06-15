function getData() {
    let result = null;

    $.ajax({
        url: 'get_revenue_data.php',
        method: 'POST',
        data: {unit: $('#chart-filter .btn.active').data('unit')},
        dataType: 'json',
        async: false,
        beforeSend: function () {
            $('#chart-container').addClass('chart-loading');
        }
    }).done(response => {
        result = response;
    }).fail(error => {
        console.log(error)
    }).always(function () {
        $('#chart-container').removeClass('chart-loading');
    });

    return result;
}

$(document).ready(function () {
    'use strict';

    const data = getData();

    const ctx = document.getElementById('revenueChart').getContext('2d');

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(data),
            datasets: [{
                data: Object.values(data),
                backgroundColor: [
                    'rgb(127, 217, 199)'
                ],
                borderColor: [
                    'rgb(26, 188, 156)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    $('.btn-group .btn').click(function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
});