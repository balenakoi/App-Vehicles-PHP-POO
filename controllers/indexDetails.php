<?php
function chargerClasse($classname)
{
    if (file_exists('../model/' . $classname . '.php')) {
        require '../model/' . $classname . '.php';
    } else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');

//conection to database
$db = Database::DB();
$vehicleManager = new VehicleManager($db);
//deleting vehicle by id 
$takeVehicles = $vehicleManager->getVehicle($_GET['id']);
if (isset($_GET['delete'])) {
    $vehicleManager->deleteVehicle($_GET['delete']);
}
include "../views/detailsVue.php";