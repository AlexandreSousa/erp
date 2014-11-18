<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 06/11/14
 * Time: 01:18
 */

class Init {
    public $controle;
    public $acao;

    function __construct($acao, $controle)
    {
        $this->acao = $acao;
        $this->controle = $controle;
    }


} 