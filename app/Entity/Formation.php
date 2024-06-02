<?php

namespace App\Entity;

use App\Entity\Experience as EntityExperience;


class Formation extends EntityExperience{

    public function __construct($datas){
        parent::__construct($datas);
    }
}