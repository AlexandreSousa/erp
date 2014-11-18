<?php
/**
 * Created by PhpStorm.
 * User: akira
 * Date: 07/11/14
 * Time: 18:34
 */
$post = $_POST['post'];

if($post == 'ok'){


    $grava = new db;
    $campos = $_POST['campo'];
    $grava->creat('cliente',$campos);

}



$topo = new Tgrid;
$topo->Ttopo('Cadastro de Level','cliente','cliente');

$x = new Tform;
$x->Tformi('form1');
$x->setLabel('Nome');
$x->Tinput('text','nome','nome','','Nome do Cliente','',20);
echo '&nbsp';
$x->setLabel('Endereço');
$x->Tinput('text','endereco','endereco','','...','',20);
echo '&nbsp';
$x->setLabel('Fone');
$x->Tinput('text','fone','fone','','...','',20);
echo '<br>';
$x->setLabel('Email');
$x->Tinput('text','email','email','','...','',20);

$x->Trecord();


echo '<br>';
$x->Tbuton('submint','Gravar');
