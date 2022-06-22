/*== This function to format the money ==*/
function money_format(number) {
    number = String(parseInt(number))
    const length = number.length;
    switch (true) {
        case length > 9: // 1 000 000 000
            return number.slice(0, length - 9) + "B";
        case length > 6: // 1 000 000
            return number.slice(0, length - 6) + "M";
        case length > 3: // 1 000
            return number.slice(0, length - 3) + "K";
        default:
            return number
    }
}

function getData() {
    let result = null;

    const start_date = $('#start-date').val();
    const end_date = $('#end-date').val();

    if (start_date && end_date && moment(start_date, 'DD/MM/YYYY').isAfter(moment(end_date, 'DD/MM/YYYY'))) {
        alert('Ngày kết thúc phải lớn hơn ngày bắt đầu.');
        return false;
    }

    $.ajax({
        url: 'get_revenue_data.php',
        method: 'POST',
        data: {
            start_date,
            end_date
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

    $('.datetimepicker').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        maxDate: new Date()
    });

    const data = getData();

    Chart.register(ChartDataLabels);
    Chart.register(ChartZoom);

    const ctx = document.getElementById('revenueChart').getContext('2d');

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(item => item.date),
            datasets: [{
                data: data.map(item => item.amount),
                backgroundColor: [
                    'rgb(127, 217, 199)'
                ],
                borderColor: [
                    'rgb(26, 188, 156)'
                ],
                borderWidth: 2,
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
                xAxis: {
                    type: 'time',
                    title: {
                        display: true,
                        text: 'Ngày',
                        font: {
                            weight: 'bold'
                        }
                    },
                    grid: {
                        display: false
                    },
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'dd-MM-yyyy'
                        },
                    }
                },
                yAxis: {
                    title: {
                        display: true,
                        text: 'Doanh thu',
                        font: {
                            weight: 'bold'
                        }
                    },
                    grid: {
                        display: false
                    },
                    ticks: {
                        callback: function(value) {
                            return money_format(value)
                        }
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
                            return moment(tooltipItems[0].label, 'MMM DD, YYYY').format('DD-MM-YYYY');
                        },
                    }
                },
                datalabels: {
                    display: true,
                    anchor: 'end',
                    align: 'top',
                    padding: -10,
                    formatter: function (value) {
                        return value ? money_format(value) : null;
                    },
                },
                zoom: {
                    pan: {
                        enabled: true,
                        mode: 'x',
                    },
                    zoom: {
                        wheel: {
                            enabled: true,
                            modifierKey: 'ctrl'
                        },
                        pinch: {
                            enabled: true
                        },
                        mode: 'x',
                    }
                }
            }
        }
    });

    /*== Handle chart filter ==*/
    $('#btn-filter-chart').click(function () {
        const result = getData();
        if (!result) {
            return false;
        }

        myChart.data.labels = result.map(item => item.date);
        myChart.data.datasets[0].data = result.map(item => item.amount);
        myChart.resetZoom();
        myChart.update();
    });
});