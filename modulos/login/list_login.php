<?php
    
$res = $mysqli->query('SELECT * FROM login');

?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <br>
    <body>
    
    <?php 
    
    $topo = new Tgrid;
    
    $topo->Ttopo('Login','login','login');
    
    ?>
        <table border='1'>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                </tr>
                <tr>
                <?php 
                while($tab = $res->fetch_array()){
                  echo '<td>'.$tab['id'].'</td>';  
                  echo '<td>'.$tab['nome'].'</td>';  
                }
                ?>
                </tr>
        </table>
    </body>
</html>