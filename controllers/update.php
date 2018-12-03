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

//conection to database
$db = Database::DB();
$vehicleManager = new VehicleManager($db);
//geting vehicle by id for updating
$vehicleUpdate = $vehicleManager->getVehicle($_GET['id']);

//verifactions
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
                                'id' => addslashes(strip_tags($vehicleUpdate->getId())),
                                'type' => addslashes(strip_tags($_POST['type'])),
                                'name' => addslashes(strip_tags($_POST['name'])),
                                'color' => addslashes(strip_tags($_POST['color'])),
                                'mark' => addslashes(strip_tags($_POST['mark'])),
                                'doors' => addslashes(strip_tags($_POST['doors'])),
                                'weight' => addslashes(strip_tags($_POST['weight']))
                            ]);
                            $vehicleManager->updateVehicle($car);
                            header('location:index.php');
                        } elseif ($_POST['type'] == 'camion') {
                            echo 'camion';
                            $camion = new Camions([
                                'id' => addslashes(strip_tags($vehicleUpdate->getId())),
                                'type' => addslashes(strip_tags($_POST['type'])),
                                'name' => addslashes(strip_tags($_POST['name'])),
                                'color' => addslashes(strip_tags($_POST['color'])),
                                'mark' => addslashes(strip_tags($_POST['mark'])),
                                'doors' => addslashes(strip_tags($_POST['doors'])),
                                'weight' => addslashes(strip_tags($_POST['weight']))
                            ]);
                            $vehicleManager->updateVehicle($camion);
                            header('location:index.php');

                        } elseif ($_POST['type'] == 'moto') {
                            $moto = new Motos([
                                'id' => addslashes(strip_tags($vehicleUpdate->getId())),
                                'type' => addslashes(strip_tags($_POST['type'])),
                                'name' => addslashes(strip_tags($_POST['name'])),
                                'color' => addslashes(strip_tags($_POST['color'])),
                                'mark' => addslashes(strip_tags($_POST['mark'])),
                                'weight' => addslashes(strip_tags($_POST['weight'])),
                                'doors' => 0
                            ]);
                            $vehicleManager->updateVehicle($moto);
                            header('location:index.php');
                        }
                    }

                }
            }
        }
    }
}

?>
<?php
require '../views/updateVue.php';
?>