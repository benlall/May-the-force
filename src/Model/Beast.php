<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */
namespace Model;
/**
 * Class Item
 */
class Beast
{
    private $id;
    private $name;
    private $picture;
    private $size;
    private $area;
    private $id_planet;
    private $id_movie;
    private $planetName;
    private $title;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Beast
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Beast
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     * @return Beast
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     * @return Beast
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     * @return Beast
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPlanet()
    {
        return $this->id_planet;
    }

    /**
     * @param mixed $id_planet
     * @return Beast
     */
    public function setIdPlanet($id_planet)
    {
        $this->id_planet = $id_planet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMovie()
    {
        return $this->id_movie;
    }

    /**
     * @param mixed $id_movie
     * @return Beast
     */
    public function setIdMovie($id_movie)
    {
        $this->id_movie = $id_movie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanetName()
    {
        return $this->planetName;
    }

    /**
     * @param mixed $planetName
     * @return Beast
     */
    public function setPlanetName($planetName)
    {
        $this->planetName = $planetName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Beast
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}
