<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wind Live GNU/Linux (Galeria de imagens)</title>

<!--
###################################
##			Estilos              ##
###################################
-->
<style>
body {
	text-align:center;
	margin:0;
	padding:0;
}
div {
	padding:13px;
	display:block;
	border:1px solid #ddd;
	background:#eee;
	font-size:10px;
	font-family:Arial, Helvetica, sans-serif;
	color:#999;
	margin:0 auto;
}
div.thumb {
	float:left;
	margin:0 14px 14px 0;
	padding:0;
}
div.thumb a {
	float:left;
	padding:13px;
}
div.thumb a:hover {
	background:#b70000;
}
div.thumb img {
	width:100px;
	height:100px;
}
div.viewer img {
	height:600px;
}
div p {
	padding:8px 0 0px;
	margin:0;
}
div a {
	color:#666;
	text-transform:uppercase;
	text-decoration:none;
	font-weight:bold;
}
div a:hover {
	color:#b70000;
	text-decoration:underline
}
</style>
</head>
<body>


<!--
#################################
##			Lógica             ##
#################################
-->
<?php
    	date_default_timezone_set('UTC');
	
	//URL onde o arquivo PHP vai ficar
	$url_galeria = "./galeria.php";

	//URL onde o arquivo PHP vai ficar
	$pasta_fotos = ".";

	//Entrada para criar nova pasta
	echo "<div>";
        echo "<form action=\"./galeria.php\" method=\"POST\" >";
        echo "<input type=\"text\" name=\"NewFolder\" value=\"\" />";
        echo "<input type=\"submit\" value=\"Criar Pasta\" onclick=\"this.value='Aguarde...'\">";
        echo "</form>";
       	echo "</div>";
		
	$NewFolderName = $_POST["NewFolder"];	
	
	if($NewFolderName != ""){
	    mkdir("./" . $pasta_fotos . "/" . $NewFolderName . "/");
	}		
	
	//Lista as pastas no diretório
	$ponteiro  = opendir($pasta_fotos);

	// monta os vetores com os itens encontrados na pasta
	while ($nome_itens = readdir($ponteiro)) {
		$itens[] = $nome_itens;
	}
	
	// ordena o vetor de itens
	sort($itens);

	// percorre o vetor para fazer a separacao entre arquivos e pastas 
	foreach ($itens as $listar) {
		// retira "./" e "../" para que retorne apenas pastas e arquivos
		if ($listar!="." && $listar!=".." && $listar!=".tmb" && $listar!=".quarantine"){ 
			$pastas[]=$listar; 
		}
	}

	//Verifica se deve exibir a lista ou uma foto
	if ($_GET["folder"] == "") {
		echo "<br><b>*****\t";
		echo count($pastas);
		echo "\t";
		echo "PASTAS NA GALERIA";
		echo "\t*****</b></br>";
		//Faz o loop pelo folder de imagens
		for($i=0; $i < count($pastas); $i++) {	
			//Cria cada uma das thumbs dentro de uma <div> com link para a imagem grande
			echo "<div class='thumb a'>";
			echo "<a href='" . $url_galeria . "?folder=" . $i . "'>";
			echo "<img src='" . "./folder-image.png" . "'>";
			echo "</a>";
			echo "<br><b>$pastas[$i]</b></br>";
			echo "</div>";
		}
	} else {

		//Início da função para fotos
		//Captura o índuce da imagem que foi fornecido;
		$iFotos = "";
		$iFolder = "";
		$contage = 0;
		foreach(explode("?", $_GET["folder"]) as $i){
			$contage++;
			if($contage == 1){
				$iFolder = $i;
			} else {
				$iFotos = $i;
			}
		}

		$fotos = array();
	
		$source = $pasta_fotos . "/" . $pastas[$iFolder];

		//Loop que percorre a pasta das imagens e armazena o nome de todos os arquivos
		foreach(glob($source . '/{*.jpg,*.png,*.gif}', GLOB_BRACE) as $image) {	
			
			$fotos[] = $image;
		
		}
		
		//Ordena as fotos
		sort($fotos);
		
		//Verifica se deve exibir a lista ou uma foto
		if ($iFotos == "") {
			echo "<br><b>";
			echo "Encontradas ";
			echo count($fotos);
			echo " imagens na pasta: ";
			echo $pastas[$iFolder];
			echo "</b></br>";
			echo "<br><a href='" . $url_galeria . "'>Voltar para as pastas ...</a></br>";
			echo "<br></br>";
			//Faz o loop pelo folder de imagens
			for($i=0; $i < count($fotos); $i++) {	
									
				//Cria cada uma das thumbs dentro de uma <div> com link para a imagem grande
				echo "<div class='thumb'>";
				echo "<a href='" . $url_galeria . "?folder=" . $iFolder . "?" . $i . "'>";
				echo "<img src='" . $fotos[$i] . "'>";
				echo "</a>";
				echo "</div>";
		    
			}

		} else {
			
				//Configura os links de próxima e anterior
				if ( $iFotos == 0 ) {
					$anterior = "";
					$aFoto ="";
				} else {
					$anterior = $iFotos - 1;
					$aFoto = $fotos[$iFotos - 1];
				}
				if ( $iFotos == count($fotos)-1 ) {
					$proxima = "";
					$pFoto = "";
				} else {
					$proxima = $iFotos + 1;
					$pFoto = $fotos[$iFotos + 1];
				}

				//Quando solicitada uma imagem em particular, monta a <div> e insere a imagem grande de acordo com o link
				echo "<div class='viewer'>";
				echo "<a href='" . $url_galeria . "?folder=" . $iFolder . "?" . $proxima . "'>";
				echo "<img src='" . "./" . $fotos[$iFotos] . "'>";
				echo "</a>";
				echo "<p><a href='" . $url_galeria . "?folder=" . $iFolder . "?" . $anterior . "'>Foto anterior</a> | <a href='" . $url_galeria . "'>Voltar para a galeria</a> | <a href='" . $url_galeria . "?folder=" . $iFolder . "?" . $proxima . "'>Próxima foto</a></p>";
				echo "</div>";
			
		}
	}

?>
</body>
</html>
