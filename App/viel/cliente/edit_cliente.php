<?php
/**
 * Created by PhpStorm.
 * User: akira
 * Date: 11/11/14
 * Time: 17:57
 */

$id = $_GET['id'];

$mostra = $db->read('menu',"WHERE id = {$id}",'');

$form = new Tform;
$form->Tformi('form1');
$form->setLabel('id_ramo');
$form->Tinput('text','nome','id',$mostra[id_ramo],'','',20);
$form->setLabel('id_level');
$form->Tinput('text','nome','id',$mostra[id_level],'','',20);
$form->setLabel('Icon');
$form->Tinput('text','nome','id',$mostra[icon],'','',20);
$form->setLabel('Nome');
$form->Tinput('text','nome','id',$mostra[nome],'','',20);
$form->setLabel('Status');
$form->Tinput('text','nome','id',$mostra[status],'','',20);
echo '<br>';
$form->Tbuton('submit','Atualizar');
$form->Tformf();
