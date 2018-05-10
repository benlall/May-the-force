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
class BeastController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function list()
    {
        $beastsManager = new BeastManager();
        $beasts = $beastsManager->selectAll();

        if (isset($_SESSION['message'])) {
            $messageSession = $_SESSION['message'];
            $_SESSION['message'] = null;
        } else {
            $messageSession = null;
        }

        $templateVariables = ['messageSession' => $messageSession, 'beasts' => $beasts,];

        return $this->twig->render('Beast/list.html.twig', $templateVariables);
    }

    /**
     * Display item informations specified by $id
     *
     * @param int $id
     *
     * @return string
     */
    public function details(int $id)
    {

        $beastManager = new BeastManager();
        $beast = $beastManager->selectOneById($id);

        $templateVariables = ['beast' => $beast,
            'id' => $id];

        return $this->twig->render('Beast/details.html.twig', $templateVariables);
    }

    /**
     * Display item creation page
     *
     * @return string
     */
    public function add()
    {
        $planetManager = new PlanetManager(); //to list all planets in form
        $planets = $planetManager->selectAll();

        $movieManager = new MovieManager(); //to list all movies in form
        $movies = $movieManager->selectAll();

        $errors[] = null;
        $errorMessage = null;
        $name = null;
        $area = null;
        $size = null;
        $picture = null;
        $planet = null;
        $movie = null;

        if ($_POST) {

            $errorMessage = 'Merci de renseigner ce champ';

            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $errors['name'] = $errorMessage;
            }
            if (!empty($_POST['picture'])) {
                $picture = $_POST['picture'];
            } else {
                $errors['picture'] = $errorMessage;;
            }
            if (!empty($_POST['size'])) {
                $size = (int) $_POST['size'];
            } else {
                $errors['size'] = $errorMessage;;
            }
            if (!empty($_POST['area'])) {
                $area = $_POST['area'];
            } else {
                $errors['area'] = $errorMessage;;
            }
            if (!empty($_POST['planet'])) {
                $planet = (int)$_POST['planet'];
            } else {
                $errors['planet'] = $errorMessage;;
            }
            if (!empty($_POST['movies'])) {
                $movie = (int)$_POST['movies'];
            } else {
                $errors['movies'] = $errorMessage;;
            }

            if (!is_null($errors)) {
                $datas['name'] = $name;
                $datas['picture'] = $picture;
                $datas['size'] = $size;
                $datas['area'] = $area;
                $datas['id_planet'] = $planet;
                $datas['id_movie'] = $movie;

                $beastManager = new BeastManager();
                $beastManager->insert($datas);

                $_SESSION['message'] = 'Insersion OK';
                header('Location: /beasts');
                die;
            } else {
                $templateVariables = [
                    'planets' => $planets,
                    'movies' => $movies,
                    'errors' => $errorMessage];

                return $this->twig->render('Beast/add.html.twig', $templateVariables);
            }
        }

        $templateVariables = [
            'planets' => $planets,
            'movies' => $movies,
            'errors' => $errorMessage];

        return $this->twig->render('Beast/add.html.twig', $templateVariables);
    }

    /**
     * Display item creation page
     *
     * @return string
     */
    public function edit(int $id)
    {
        $beastManager = new BeastManager();
        $beast = $beastManager->selectOneById($id);

        $planetManager = new PlanetManager(); //to list all planets in form
        $planets = $planetManager->selectAll();

        $movieManager = new MovieManager(); //to list all movies in form
        $movies = $movieManager->selectAll();

        if (isset($_POST['submit'])) {
            $datas = [];
            $datas['name'] = $_POST['name'];
            $datas['picture'] = $_POST['picture'];
            $datas['size'] = $_POST['size'];
            $datas['area'] = $_POST['area'];
            $datas['id_planet'] = $_POST['planet'];
            $datas['id_movie'] = $_POST['movies'];

            $beastManager = new BeastManager();
            $beastManager->update($id, $datas);

            $_SESSION['message'] = 'Mise à jour OK';
            header('Location: /beasts');
            die;
        }

        if (isset($_POST['delete'])) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                header('Location: /beasts/delete/' . $id);
                die;
            }
        }

        $templateVariables = ['beast' => $beast,
            'movies' => $movies,
            'planets' => $planets,
            'id' => $id,
            'errors' => $errorMessage];

        return $this->twig->render('Beast/edit.html.twig', $templateVariables);
    }

    public function delete(int $id)
    {
        $beastManager = new BeastManager();
        $beastManager->delete($id);

        $_SESSION['message'] = 'Suppression OK';
        header('Location: /beasts');
        die;
    }

}
