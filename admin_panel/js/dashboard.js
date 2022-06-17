/*== This function to format the money ==*/
function money_format(number) {
    number = String(number)
    const length = number.length;
    switch (true) {
        case length > 9: // 1 000 000 000
            return number.slice(0, length - 8) + "tỷ";
        case length > 6: // 1 000 000
            return number.slice(0, length - 6) + "tr";
        case length > 3: // 1 000
            return number.slice(0, length - 3) + "K";
        default:
            return number
    }
}

function getActiveLabel() {
    return $('#chart-container .btn.active').text();
}

function getData() {
    let result = null;

    $.ajax({
        url: 'get_revenue_data.php',
        method: 'POST',
        data: {
            unit: $('#chart-filter .btn.active').data('unit')
        },
        dataType: 'json',
        async: false,
        beforeSend: function () {
            $('#chart-container').addClass('loading');
        }
    }).done(response => {
        result = response;
    }).fail(error => {
        console.log(error)
    });

    return result;
}

$(document).ready(function () {
    'use strict';

    const data = getData();

    Chart.register(ChartDataLabels);

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
            responsive: true,
            animation: {
                onComplete: function () {
                    $('#chart-container').removeClass('loading');
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: getActiveLabel(),
                        font: {
                            weight: 'bold'
                        }
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Doanh thu',
                        font: {
                            weight: 'bold'
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        title: (tooltipItems) => {
                            const month = String(new Date().getMonth() + 1).padStart(2, 0);
                            const year = new Date().getFullYear();
                            return getActiveLabel() + " " + tooltipItems[0].label.padStart(2, 0) +  "/" + month + "/" + year;
                        },
                    }
                },
                datalabels: {
                    display: true,
                    anchor: 'end',
                    align: 'top',
                    padding: 0,
                    formatter: function (value) {
                        return money_format(value);
                    },
                },
            }
        }
    });

    /*== Handle chart filter ==*/
    $(document).on('click', '#chart-filter .btn', function () {
        if ($(this).hasClass('active')) {
            return false;
        }

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        const result = getData();

        myChart.data.labels = Object.keys(result);
        myChart.data.datasets[0].data = Object.values(result);
        myChart.options.scales.x.title.text = getActiveLabel();

        myChart.update();
    });
});