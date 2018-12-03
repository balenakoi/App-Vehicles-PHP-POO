<?php

/**
 * Vehicle class
 */
abstract class Vehicle
{
    //declared the propertys
    protected $id,
        $type,
        $name,
        $mark,
        $weight,
        $color,
        $doors;


    /**
     * constructor
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    /**
     * Hydratation
     *
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // We retrieve the name of the setter corresponding to the attribute.
            $method = 'set' . ucfirst($key);
                
            // If the corresponding setter exists.
            if (method_exists($this, $method)) {
                // We call the setter.
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $id = (int)$id;

        if ($id > 0) {
            $this->id = $id;
        }

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType(string $type)
    {
        $this->type = $type;

    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of mark
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set the value of mark
     *
     * @return  self
     */
    public function setMark(string $mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get the value of weight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */
    public function setWeight($weight)
    {
        $weight = (int)$weight;
        $this->weight = $weight;

        return $this;
    }



    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor(string $color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of doors
     */
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * Set the value of doors
     *
     * @return  $this
     */
    public function setDoors($doors)
    {
        $doors = (int)$doors;
        $this->doors = $doors;

        return $this;
    }
}