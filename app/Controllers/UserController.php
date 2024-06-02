<?php

namespace App\Controllers;

use App\Entity\User;
use Framework\Manager\Manager;

class UserController
{

    protected $manager;
    public function __construct()
    {
        $this->manager = new Manager(User::class);
    }

    public function index()
    {

        $page_title = 'User';


        // $listePersonnes = findAll($db, 'exercices');
        // $this->manager = new Manager(Portfolio::class);
        $listePersonnes = $this->manager->findAll();
        require '../app/views/user/index.php';
    }

    public function create()
    {
        $page_title = 'Ajouter';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {

            $_POST['password'] = md5($_POST['password'] ?? '');

            // récupération des données du formulaire

            $user = new User($_POST);
            $user = $this->manager->insert($user);

            //$id = $db->lastInsertId();

            // redirection
            header("location:" . generateUri('user.index'));
            exit();
        }

        require '../app/views/user/create.php';
    }
    public function show()
    {
        $page_title = 'Afficher';

        $id = $_GET['id'] ?? 1;

        // Recherche de la personne

        $personne = $this->manager->find(compact('id'));

        if (!$personne) {
            header("location:" . generateUri('user.index'));
            exit();
        }

        require '../app/views/user/show.php';
    }
    public function update()
    {
        $page_title = 'Modifier';

        $id = $_GET['id'] ?? 0;

        // Recherche de la personne
        $personne = $this->manager->find(compact('id'));

        if (!$personne) {
            header("location:" . generateUri('user.index'));
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
            // récupération des données du formulaire
            $personne->nom = $_POST['nom'] ?? "";
            $personne->email = $_POST['email'] ?? "";
            $personne->role = $_POST['role'] ?? "";
            $personne->password = $_POST['password'] = md5($_POST['password'] ?? '');

            // modification de la personne
            $this->manager->update($personne);

            header("location:" . generateUri('user.index'));
            exit();
        }

        require '../app/views/user/update.php';
    }

    public function delete()
    {
        $page_title = 'Supprimer';

        $id = $_GET['id'] ?? 0;

        // Recherche de la personne
        $personne = $this->manager->find(compact('id'));


        if (!$personne) {
            header("location:" . generateUri('User.index'));
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supprimer'])) {
            // suppression photo
            
            // suppression de la personne
            $this->manager->delete($personne);

            header("location:" . generateUri('user.index'));
            exit();
        }

        require '../app/views/User/delete.php';
    }

    public function login()
    {
        $page_title = 'connexion';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = md5($_POST['password'] ?? '');


            $sql = "SELECT * FROM users WHERE email= '$email' AND password='$password'";

            $user = $this->manager->sql($sql)->fetch();
            if ($user) {
                $_SESSION['user'] = $user;
            }

            header('location:' . generateUri('cv.index'));
            exit();
        }
        require '../app/views/User/login.php';
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION = [];
            session_destroy();
            header('Location:' . generateUri('cv.index'));
            exit();
        }
    }
}
