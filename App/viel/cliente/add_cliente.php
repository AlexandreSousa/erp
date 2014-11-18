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
    $grava->creat('menu',$campos);

}



$topo = new Tgrid;
$topo->Ttopo('Cadastro de Level','cliente','cliente');

$x = new Tform;
$x->Tformi('form1');
$x->setLabel('Ramo');
$x->Tinput('text','id_ramo','id_ramo','','Ramo','',20);
echo '&nbsp';
$x->setLabel('id_level');
$x->Tinput('text','id_level','id_level','','...','',20);
echo '&nbsp';
$x->setLabel('icon');
$x->Tinput('text','icon','icon','','...','',20);
echo '<br>';
$x->setLabel('nome');
$x->Tinput('text','nome','nome','','...','',20);

echo '&nbsp';
$x->setLabel('status');
$x->Tinput('text','status','status','','...','',20);
$x->Trecord();


echo '<br>';
$x->Tbuton('submint','Gravar');
