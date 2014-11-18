<?php
/**
 * Conexão com Banco de dados
 * 
 * Classe para conexão com o banco de dados
 * 
 * @package     Damascao
 * @subpackage  Damasco.Core.Model
 */
class db {
    public $_db;
    public $Key;
    public $limite;


    public function __construct()
    {
        require('/var/www/damasco/App/config/db.php');
        $this->db = new mysqli($host,$user,$pass,$data);
    }

    /**
     * 
     * @param   string  $tabela     Nome da tabela
     * @param   string  $campos     Campos da tabela
     * @return  void
     */
    public function creat($tabela,$campos)
    {

        $keys   = array_keys($campos);
        $chaves = "`".implode("`,`", $keys)."`";
        $valores= "'" . implode("','", $campos) . "'";
        $sql    = "INSERT INTO {$tabela} ({$chaves})VALUES ({$valores})";
        $this->db->query($sql);

        //$alert  = new Alert;
        //$alert->Talert();

    }
    /**
     * 
     * @param   string  $db       Nome da Tabela
     * @param   string  $where    Where da tabela
     * @param   string  $limit    Limites maximo e minimu para consulta
     * @return  void
     */

    public function read($db, $where, $limit){

       $select =  $this->db->query("SELECT * FROM {$db}  {$where} {$limit}");
       $val = $select->fetch_array();
       return $val;
    }

    public function update($_db,$campos,$where){

        $keys = array_keys($campos);
        $array   = array_values($campos);
        $array2  = array_values($keys);
        $total = count($campos)-1;
        for($i = 0; $i <= $total; $i++ ){
            $variavel.= "`$array2[$i]`='$array[$i]'".',';
        }
        $size = strlen($variavel);
        $sis = substr($variavel,0, $size-1);
        $mysqli->query("UPDATE  `$_db` SET  $sis  WHERE `{$this->Key}` = '$where'");

    }

    public function delet($_db,$id,$modulo,$arquivo){


        $this->db->query("DELETE FROM `$_db` WHERE `{$this->Key}` = '$id'");


        if(isset($modulo)){
            echo '<meta http-equiv="refresh" content="0;URL=?pg='.$modulo.'/list_'.$arquivo.'" />';
        }
    }

    /**
     * @param mixed $Key
     */
    public function setKey($Key)
    {
        $this->Key = $Key;
    }

}
