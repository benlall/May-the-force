<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\BeastManager;
use Model\MovieManager;
use Model\PlanetManager;

/**
 * Class ItemController
 */
class MovieController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function list()
    {
        $movieManager = new MovieManager();
        $movies = $movieManager->selectAll();

        $templateVariables = ['movies' => $movies,];

        return $this->twig->render('Movie/list.html.twig', $templateVariables);
    }

}
