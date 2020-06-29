<?php
chdir('..');chdir('..');
include_once 'services/OperationService.php';
include_once 'classes/Operation.php';
include_once 'services/RecuperationService.php';
include_once 'classes/Recuperation.php';

$rs = new RecuperationService();
$recuperations = $rs->findAllJ();
$os = new OperationService();
$operations = $os->findAll();
$vr = $rs->findByVEtat();
$nvr = $rs->findByNvEtat();

$recupCount = count($recuperations);
$operCount = count($operations);
$validRecupCount = count($vr);
$invalidRecupCount = count($nvr);
//$cc = op.findOperByVille();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once 'includes/headerScripts.php'; ?>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once 'includes/sidebar.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $operCount ?></div>
                                    <div>Operations</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="operation.php">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $recupCount ?></div>
                                    <div>Récupérations</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="recuperation.php">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $validRecupCount ?></div>
                                    <div>Valide Récup</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="recuperation.php">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bell fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $invalidRecupCount ?></div>
                                    <div>Invalide Récup</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="recuperation.php">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-8 -->
                <div class="col-lg-6">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Opérations By Villes
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <section class="col-lg-12 connectedSortable">
                                    <div class="box box-solid bg-gray-active">
                                        <canvas height="250" id="operByVille"></canvas>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <!-- /.col-lg-8 -->
                <div class="col-lg-6">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Opérations By Year
                        </div>
                        <div class="panel-heading">
                            <select class="col-lg-3 form-control" id="anneeOper">
                                <option value="">Choisir Année</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <section class="col-lg-12 connectedSortable">
                                    <div class="box box-solid bg-gray-active" id="chart-container">
                                        <canvas height="250" id="operByMonth"></canvas>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include_once 'includes/footerScripts.php'; ?>
    <script>
       
        $.ajax({
        url: '../../api/findOperByVille.php',
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function (data, textStatus, jqXHR) {
            console.log(data);
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
            url: '../../api/findOperByYear.php',
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            data:{year:year},
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                var dataCh = [];
                var label = [];
                for (var i = 0; i < data.length; i++) {
                    dataCh.push(data[i].oper);
                    label.push(data[i].mois);
                }
                var ctx = document.getElementById("operByMonth").getContext('2d');
                
                var myChart = new Chart(ctx, {
                    type: 'bar',
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
    });
        
            
    </script>
</body>

</html>
