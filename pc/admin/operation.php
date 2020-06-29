<?php
chdir('..');chdir('..');
include_once 'services/OperationService.php';
include_once 'classes/Operation.php';
include_once 'services/RecuperationService.php';
include_once 'classes/Recuperation.php';

$rs = new RecuperationService();
$recuperations = $rs->findAllJ();
$os = new OperationService();
$opers = $os->findAll();
//$operations = array_reverse($opers);
$operations = $os->findAll();
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
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Opérations
                        </div>
                                <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Button trigger modal -->
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myOperModal">
                                    Ajouter Opération
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="myOperModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Service Opération</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Libelle</label>
                                                    <input class="form-control" id="libelle" name="libelle" placeholder="libelle...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Adresse</label>
                                                    <input class="form-control" id="adresse" name="adresse" placeholder="adresse...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ville</label>
                                                    <input class="form-control" id="ville" name="ville" placeholder="ville...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Début</label>
                                                    <input class="form-control" id="dateDebut" type="date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Fin</label>
                                                    <input class="form-control" id="dateFin" type="date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Nbr Jours</label>
                                                    <input class="form-control" id="nbrJ" type="number" placeholder="nbr des jours ..." >
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" id="idOperation" type="hidden" >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" name="addOper" id="addOper" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        <!-- .panel-body -->
                        <div class="panel-body" id="operTable">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Libelle</th>
                                        <th>Adresse</th>
                                        <th>Ville</th>
                                        <th>Date Début</th>
                                        <th>Date Fin</th>
                                        <th>Nbr Jours</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($operations as $fon) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $fon->libelle ?></td>
                                            <td><?= $fon->adresse ?></td>
                                            <td><?= $fon->ville ?></td>
                                            <td><?= $fon->dateDebut ?></td>
                                            <td><?= $fon->dateFin ?></td>
                                            <td><?= $fon->nbrJours ?></td>
                                            <td><button class="btn btn-info updateO" data-toggle="modal" data-target="#myOperModal" id="updateO" data="<?= $fon->id ?>">Modifier</button></td>
                                            <td><button class="btn btn-warning deleteO" id="deleteO" data="<?= $fon->id ?>">Supprimer</button></td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include_once 'includes/footerScripts.php'; ?>
    <script src="scripts/operation.js" type="text/javascript"></script>

</body>

</html>
