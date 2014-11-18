<?php
/**
 * Created by PhpStorm.
 * User: akira
 * Date: 08/11/14
 * Time: 12:27
 */

class Tteste {
    public $tste;
    


    public function ola(){
        echo $this->tste;
    }

    /**
     * @param mixed $tste
     */
    public function setTste($tste)
    {
        $this->tste = $tste;
    }
} 