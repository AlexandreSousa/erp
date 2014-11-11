<?php
if($css == 0){
}elseif($css == 1){
    ?>
    <?php
    $path = "css/";
    $diretorio = dir($path);
    while($arquivo = $diretorio -> read()){

        if($arquivo == '..'){

        }elseif($arquivo == '.'){

        }else{  ?>
            
            <link href="css/<?php echo $arquivo; ?>" rel="stylesheet" type="text/css" />
        <?php
        }

    } $diretorio -> close();
    ?>
<?php
}
?>