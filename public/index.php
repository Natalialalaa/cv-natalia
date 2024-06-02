<?php

session_start();
$auth = $_SESSION['user'] ?? null;

use App\Controllers\CompetenceController;
use App\Controllers\ErrorController;
use App\Controllers\HomeController;
use App\Controllers\IndexController;
use App\Controllers\UserController;
use Framework\Manager\Manager;
use App\Controllers\ExperienceController;
use App\Controllers\FormationController;
use App\Controllers\PortofolioController;

require_once join(DIRECTORY_SEPARATOR, [__DIR__, '..', 'vendor', 'autoload.php']);

$db = require "../app/model/bdd.php";
Manager::setDb($db);

$controllerHome = new HomeController;
$controllerError = new ErrorController;
$controllerIndex = new IndexController;
$controllerCompetence = new CompetenceController;
$controllerExperience = new ExperienceController;
$controllerFormation = new FormationController;
$controllerPortofolio = new PortofolioController;
$controllerUser = new UserController;


$uri = $_SERVER['REDIRECT_URL'] ?? $_SERVER['REQUEST_URI'];
// supprime les eventuels parametres
$uri = strpos($uri, '?') ? substr($uri, 0, strpos($uri, '?')) : $uri;
// normalement index.php se trouve à la racine de votre site
// dans le cas contraire il faut en tenir compte
$root = dirname($_SERVER['PHP_SELF']);
// supprime le $root
$uri = str_replace($root, '', $uri);

$routes = [];
$uri = $_SERVER['REDIRECT_URL'] ?? $_SERVER['REQUEST_URI'];
// supprime les eventuels parametres
$uri = strpos($uri, '?') ? substr($uri, 0, strpos($uri, '?')) : $uri;
// normalement index.php se trouve à la racine de votre site
// dans le cas contraire il faut en tenir compte
$root = dirname($_SERVER['PHP_SELF']);
// supprime le $root
$uri = str_replace($root, '', $uri);

$routes = [];
// $routes[] = [path, name, [controller, action]];
// path : uri de la ressource
// name : clé unique de la route


/*$routes[] = ['/', 'home', ['home', 'index']];
$routes[] = ['/accueil', 'home.accueil', ['home', 'index']];

$routes[] = ['/personnes', 'personne', ['personne', 'index']];
$routes[] = ['/ajouter-personne', 'personne.create', ['personne', 'create']];
$routes[] = ['/afficher-personne', 'personne.show', ['personne', 'show']];
$routes[] = ['/modifier-personne', 'personne.update', ['personne', 'update']];
$routes[] = ['/supprimer-personne', 'personne.delete', ['personne', 'delete']];*/

// permet de rechercher la route correspondant à l'uri

if (authrole('admin') || authRole('editeur')) {
    $routes[] = ['/user', 'user.index', ['user', 'index']];
    $routes[] = ['/user-supprimer', 'user.delete', ['user', 'delete']];
    $routes[] = ['/user-afficher', 'user.show', ['user', 'show']];
    $routes[] = ['/user-modifier', 'user.update', ['user', 'update']];
    $routes[] = ['/competence-add', 'competence.add', ['competence', 'add']];
    $routes[] = ['/competence-delete', 'competence.delete', ['competence', 'delete']];
    $routes[] = ['/competence-update', 'competence.update', ['competence', 'update']];
    $routes[] = ['/experience-add', 'experience.add', ['experience', 'add']];
    $routes[] = ['/experience-delete', 'experience.delete', ['experience', 'delete']];
    $routes[] = ['/experience-update', 'experience.update', ['experience', 'update']];
    $routes[] = ['/formation-add', 'formation.add', ['formation', 'add']];
    $routes[] = ['/formation-delete', 'formation.delete', ['formation', 'delete']];
    $routes[] = ['/formation-update', 'formation.update', ['formation', 'update']];
    $routes[] = ['/portofolio-add', 'portofolio.add', ['portofolio', 'add']];
    $routes[] = ['/portofolio-delete', 'portofolio.delete', ['portofolio', 'delete']];
}

$routes[] = ['/login', 'user.login', ['user', 'login']];
$routes[] = ['/logout', 'user.logout', ['user', 'logout']];
$routes[] = ['/user-ajouter', 'user.create', ['user', 'create']];
$routes[] = ['/', 'cv.index', ['index', 'index']];
$routes[] = ['/portofolio-index', 'portofolio.index', ['portofolio', 'index']];
// permet de rechercher la route correspondant à l'uri
function matchUri($uri)
{
    global $routes;
    foreach ($routes as $route) {
        if ($route[0] == $uri) return $route;
    }
    return null;
}

// permet de générer l'uri à partir du nom de la route
function generateUri($name)
{
    global $routes;
    global $root;
    foreach ($routes as $route) {
        if ($route[1] == $name) return $root . $route[0];
    }
    return '';
}

function auth($champ = null)
{
    $auth = $_SESSION['user'] ?? null;
    if (!$auth)
        return null;
    if (!$champ)
        return $auth;
    return $auth->$champ;
}

function authRole($role)
{
    $authRole = auth('role');
    if (!$authRole)
        return false;
    return $authRole == $role;
}

if ($route = matchUri($uri)) {
    $controller = $route[2][0];
    $action = $route[2][1];
} else {
    $controller = "error";
    $action = "index";
}

// $controllerHome->index();
$controller = 'controller' . ucfirst($controller);
$$controller->$action();
