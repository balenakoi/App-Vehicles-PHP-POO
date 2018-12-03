<?php
declare (strict_types = 1);


/**
 * class VehicleManager for manager all 
 */
class VehicleManager
{
    private $db;

    public function __construct(PDO $db)

    {
        $this->setDb($db);
    }


    /**
     * Get the value of db
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }


    /**
     * addVehicle function
     * @param Vehicle $vehicles
     */
    public function addVehicle(Vehicle $vehicles)
    {

        $query = $this->getDb()->prepare('INSERT INTO vehicle (name, color, type, mark, weight, doors) VALUES (:name, :color, :type, :mark, :weight, :doors)');
        $query->bindValue('name', $vehicles->getName(), PDO::PARAM_STR);
        $query->bindValue('color', $vehicles->getColor(), PDO::PARAM_STR);
        $query->bindValue('type', $vehicles->getType(), PDO::PARAM_STR);
        $query->bindValue('mark', $vehicles->getMark(), PDO::PARAM_STR);
        $query->bindValue('weight', $vehicles->getWeight(), PDO::PARAM_INT);
        $query->bindValue('doors', $vehicles->getDoors(), PDO::PARAM_INT);
        $query->execute();

    }

    /**
     * List all Vehicles
     *
     * @return array $arrayOfVehicles
     */
    public function getVehicles()
    {
        // We declare an empty board
        $arrayOfVehicles = [];

        $query = $this->getDb()->query('SELECT * FROM vehicle');
        $dataVehicles = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($dataVehicles)) {

            foreach ($dataVehicles as $vehicle) {
                if (in_array('car', $vehicle)) {
                    $arrayOfVehicles[] = new Cars($vehicle);
                } elseif (in_array('camion', $vehicle)) {
                    $arrayOfVehicles[] = new Camions($vehicle);
                } else {
                    $arrayOfVehicles[] = new Motos($vehicle);
                }

            }

            return $arrayOfVehicles;

        }
    }


    /**
     *  getVehiclefunction
     *
     * @param integer $id
     * @return $vehicles
     */

    public function getVehicle(int $id)
    {
        $query = $this->getDb()->prepare('SELECT * FROM vehicle WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if (in_array('car', $data)) {
            $vehicles = new Cars($data);
        } elseif (in_array('camion', $data)) {
            $vehicles = new Camions($data);
        } else {
            $vehicles = new Motos($data);
        }

        return $vehicles;
    }


    /**
     * deleteVehicle function
     * @param [type] $id
     */

    public function deleteVehicle($id)
    {
        $query = $this->getDb()->prepare("DELETE FROM vehicle WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * updateVehicle function
     * @param [type] $vehicle
     */
    public function updateVehicle($vehicle)
    {

        $query = $this->getDb()->prepare('UPDATE vehicle SET name = :name, color = :color, type = :type, mark = :mark, weight = :weight, doors = :doors WHERE id = :id');
        $query->bindValue(':name', $vehicle->getName(), PDO::PARAM_STR);
        $query->bindValue(':color', $vehicle->getColor(), PDO::PARAM_STR);
        $query->bindValue(':type', $vehicle->getType(), PDO::PARAM_STR);
        $query->bindValue(':mark', $vehicle->getMark(), PDO::PARAM_STR);
        $query->bindValue(':weight', $vehicle->getWeight(), PDO::PARAM_INT);
        $query->bindValue(':doors', $vehicle->getDoors(), PDO::PARAM_INT);
        $query->bindValue(':id', $vehicle->getId(), PDO::PARAM_INT);
        $query->execute();

    }


}