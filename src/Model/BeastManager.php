<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

/**
 * Class BeastManager
 * @package Model
 */
class BeastManager extends AbstractManager
{
    const TABLE = 'beast';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("SELECT beast.name, beast.picture, beast.size, beast.area, planet.name as planetName, beast.id_planet, beast.id_movie, movie.title FROM planet JOIN `$this->table` ON  beast.id_planet = planet.id JOIN movie ON movie.id = beast.id_movie WHERE beast.id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

}
