<?php
// We register our autoload.
function chargerClasse($classname)
{
    if (file_exists('../model/' . $classname . '.php')) {
        require '../model/' . $classname . '.php';
    } else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');
session_start();
//conection to database
$db = Database::DB();

$vehicleManager = new VehicleManager($db);


//verifications
if (!empty($_POST['type'])) {

    if (!empty($_POST['name'])) {
        if (!empty($_POST['color'])) {
            if (!empty($_POST['mark'])) {
                $doors = intval($_POST['doors']);
                if ($doors >= 0) {
                    $weight = intval($_POST['weight']);
                    if ($weight >= 0) {
                        if ($_POST['type'] == 'car') {
                            $car = new Cars([
                                'type' => addslashes(strip_tags($_POST['type'])),
                                'name' => addslashes(strip_tags($_POST['name'])),
                                'color' => addslashes(strip_tags($_POST['color'])),
                                'mark' => addslashes(strip_tags($_POST['mark'])),
                                'doors' => addslashes(strip_tags($_POST['doors'])),
                                'weight' => addslashes(strip_tags($_POST['weight']))
                            ]);
                            $addars = $vehicleManager->addVehicle($car);
                        } elseif ($_POST['type'] == 'camion') {
                            $camion = new Camions([
                                'type' => addslashes(strip_tags($_POST['type'])),
                                'name' => addslashes(strip_tags($_POST['name'])),
                                'color' => addslashes(strip_tags($_POST['color'])),
                                'mark' => addslashes(strip_tags($_POST['mark'])),
                                'doors' => addslashes(strip_tags($_POST['doors'])),
                                'weight' => addslashes(strip_tags($_POST['weight']))
                            ]);
                            $addamion = $vehicleManager->addVehicle($camion);

                        } elseif ($_POST['type'] == 'moto') {
                            $moto = new Motos([
                                'type' => addslashes(strip_tags($_POST['type'])),
                                'name' => addslashes(strip_tags($_POST['name'])),
                                'color' => addslashes(strip_tags($_POST['color'])),
                                'mark' => addslashes(strip_tags($_POST['mark'])),
                                'weight' => addslashes(strip_tags($_POST['weight'])),
                                'doors' => 0
                            ]);
                            $addMoto = $vehicleManager->addVehicle($moto);
                        } else {
                            header('location: index.php');
                        }
                    }

                }
            }
        }
    }
}


//getting function delet
if (isset($_GET['delete'])) {
    $vehicleManager->deleteVehicle($_GET['delete']);
}


//showing all the vehicles
$takeVehicles = $vehicleManager->getVehicles();


include "../views/indexVue.php";

?>
