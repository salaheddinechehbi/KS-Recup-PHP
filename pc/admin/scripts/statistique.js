

    $.ajax({
        url: '../../api/findOperByVille.php',
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function (data, textStatus, jqXHR) {
            var dataCh = [];
            var label = [];
            for (var i = 0; i < data.length; i++) {
                dataCh.push(data[i].oper);
                label.push(data[i].ville);
            }
            var ctx = document.getElementById("operByVille").getContext('2d');
            //console.log(dataCh);
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: label,
                    datasets: [{
                            data: dataCh,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1,
                            hoverBorderWidth: 3
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }, title: {
                        display: true,
                        text: '',
                        fontSize: 25
                    }, legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            fontColor: '#000',
                            fontSize: 15
                        }
                    }
                }
            });

        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    
    
    $(document).on('change', '#anneeOper', function () {
        var year = $(this).val();
        //console.log(year);
        $('#operByMonth').remove();
        $('#chart-container').append('<canvas height="250" id="operByMonth"></canvas>');

        //var ctx = document.getElementById("operByMonth").getContext('2d');
        //ctx.clearRect(0,0,document.getElementById("operByMonth").with,document.getElementById("operByMonth").height);
        //ctx.beginPath();
        $.ajax({
            url: '../../api/sumNbrJoursByAnnee.php',
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            data:{year:year},
            success: function (data, textStatus, jqXHR) {
                var dataCh = [];
                var label = [];
                for (var i = 0; i < data.length; i++) {
                    dataCh.push(data[i].sumNbrJours);
                    label.push(data[i].mois);
                }
                var ctx = document.getElementById("operByMonth").getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                                data: dataCh,
                                label:"Jours",
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1,
                                hoverBorderWidth: 3
                            }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                        }, title: {
                            display: true,
                            text: '',
                            fontSize: 25
                        }, legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                fontColor: '#000',
                                fontSize: 15
                            }
                        }
                    }

                });

            }, error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });
             
        
    $(document).on('change', '#anneeOper1', function () {
        var year = $(this).val();
        //console.log(year);
        $('#joursByMonth').remove();
        $('#chart-container1').append('<canvas height="250" id="joursByMonth"></canvas>');

        $.ajax({
        url: "../../api/findOperByYear.php",
        type: 'GET',
        dataType: 'JSON',
        data:{year:year},
        cache: false,
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            var dataCh = [];
            var labels = [];
            for (var i = 0; i < data.length; i++) {
                dataCh.push(data[i].oper);
                labels.push(data[i].mois);
            }
            var ctx = document.getElementById("joursByMonth").getContext('2d');
            var stackedLine = new Chart(ctx,{
            type:  'line',
            data:{

                labels: labels,
                datasets: [
                {
                    data: dataCh,
                    label:"Operations",
                    borderColor:"#3cba9f",
                    fill: true
                }],
                options: {
                    title: {
                        display: true,
                        text: "Line Chart"
                    }
                }
            }
        });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus+" "+ errorThrown+" "+jqXHR);
        }
    });
});

    
//    var ctx1 = document.getElementById("operByMonthLine").getContext('2d');
//    var stackedLine = new Chart(ctx1,{
//        type:  'line',
//        data:{
//
//            labels: [200,100,150,250,300,50,150,200],
//            datasets: [
//            {
//                data: [26,45,55,42,240,160,200,180],
//                label:"Africa",
//                borderColor:"#e8c3b9",
//                fill: false
//            },
//            {
//                data: [87,12,100,89,20,260,200,280],
//                label:"Europe",
//                borderColor:"#3cba9f",
//                fill: false
//            }],
//            options: {
//                title: {
//                    display: true,
//                    text: "Line Chart"
//                }
//            }
//        }
//    });