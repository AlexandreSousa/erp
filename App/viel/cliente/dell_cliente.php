<?php
/**
 * Created by PhpStorm.
 * User: akira
 * Date: 10/11/14
 * Time: 17:21
 */

$id = $_GET['id'];
$db->setKey('id');
$db->delet('menu',$id,'cliente','cliente');