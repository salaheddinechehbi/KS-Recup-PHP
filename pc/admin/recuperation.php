<?php
chdir('..');chdir('..');
include_once 'services/OperationService.php';
include_once 'classes/Operation.php';
include_once 'services/RecuperationService.php';
include_once 'classes/Recuperation.php';

$rs = new RecuperationService();
$recuperations = $rs->findAllJ();
$os = new OperationService();
$operations = $os->findAll10();
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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Récupération
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <!-- Button trigger modal -->
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myRecupModal">
                                    Ajouter Récupération
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="myRecupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Service Opération</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nbr Jours</label>
                                                    <input class="form-control" type="number" id="nbrJ" name="nbrJ" placeholder="nbr Jours...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Opération</label>
                                                    <select class="form-control" name="operRecu" id="operRecu">
                                                        <option value="0">Choisir Opération</option>
                                                        <?php foreach ($operations as $fon) { ?>
                                                        <option value="<?= $fon->id ?>"><?= $fon->libelle ?></option>
                                                        <?php } ?>
                                                    </select>  
                                                </div>
                                                <div class="form-group">
                                                    <label>Etat</label>
                                                    <select class="form-control" name="etatRecu" id="etatRecu">
                                                        <option value="3">Choisir Etat</option>
                                                        <option value="1">Validé</option>
                                                        <option value="0">Non Validé</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" id="idRecup" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" id="addRecu" name="addRecu" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        <!-- .panel-body -->
                        <div class="panel-body" id="recupPanel" >
                            <table  width="100%" class="table table-striped table-bordered table-hover recupTable" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nbr Jours</th>
                                        <th>Operation</th>
                                        <th>Etat</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recuperations as $fon) { ?>
                                        <?php if ($fon->etat == 0) { ?> 
                                            <tr class="odd gradeX danger">
                                                <td><?= $fon->nbrJours ?></td>
                                                <td><?= $fon->oper ?></td>
                                                <td>Non Validé</td>
                                                <td><button class="btn btn-info updateR" data-toggle="modal" data-target="#myRecupModal" id="updateR" data="<?= $fon->id ?>">Modifier</button></td>
                                                <td><button class="btn btn-warning deleteR" id="deleteR" data="<?= $fon->id ?>">Supprimer</button></td>
                                             </tr>
                                        <?php  }else{ ?>
                                            <tr class="odd gradeX success">
                                                <td><?= $fon->nbrJours ?></td>
                                                <td><?= $fon->oper ?></td>
                                                <td>Validé</td>
                                                <td><button class="btn btn-info updateR" data-toggle="modal" data-target="#myRecupModal" id="updateR" data="<?= $fon->id ?>">Modifier</button></td>
                                                <td><button class="btn btn-warning deleteR" id="deleteR" data="<?= $fon->id ?>">Supprimer</button></td>
                                             </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include_once 'includes/footerScripts.php'; ?>
<script src="scripts/recuperation.js" type="text/javascript"></script>

</body>

</html>
