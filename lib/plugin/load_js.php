<?php
if($js == 0){
    
    
}elseif($js == 1){

?>
<?php 
$path = "lib/js/";
$diretorio = dir($path);  
while($arquivo = $diretorio -> read()){ 
    
 
    
    if($arquivo == '..'){
        
        
    }elseif($arquivo == '.'){
        
         
    }else{ ?>

<script type="text/javascript" src="lib/js/<?php echo $arquivo; ?>"></script>
     <?php   
    }
    
} $diretorio -> close();
}