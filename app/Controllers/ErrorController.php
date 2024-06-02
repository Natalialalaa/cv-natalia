<?php

namespace App\Controllers;

use Framework\Manager\Manager;

use App\Entity\Experience;

class ErrorController
{

    public function index(){
        require '../app/views/404.php';
    }

}