<?php
/**
 * Created by PhpStorm.
 * User: akira
 * Date: 11/11/14
 * Time: 17:57
 */
 
 
 /**
  * FUNÇÃO PARA FAZER UPDATE
  * 
  */
 
 
  $post = $_POST['post'];

if($post == 'ok'){
    $grava = new db;
    $campos = $_POST['campo'];
    $id = $_POST['id'];
    $grava->setKey('id');
    $grava->update('cliente',$campos,$id);
}

$grid = new Tgrid;

$grid->Ttopo('Edita Cliente','cliente','cliente');

$id = $_GET['id'];

$mostra = $db->read('cliente',"WHERE id = {$id}",'');

$form = new Tform;
$form->Tformi('form1');
$form->TprimaryInput('hidden','id','id',$mostra[id]);
$form->setLabel('Nome');
$form->Tinput('text','nome','nome',$mostra[nome],'','',20);
echo '&nbsp';
$form->setLabel('Endereço');
$form->Tinput('text','endereco','endereco',$mostra[endereco],'','',20);
echo '&nbsp';
$form->setLabel('Fone');
$form->Tinput('text','fone','fone',$mostra[fone],'','',20);
echo '<br />';
$form->setLabel('E-Mail');
$form->Tinput('text','email','id',$mostra[email],'','',20);
$form->Trecord();
echo '<br>';
$form->Tbuton('submit','Atualizar');
$form->Tformf();
