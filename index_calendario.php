<?php
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    	date_default_timezone_set('UTC');

	$feriados = array(
		"Conf universal: 01/01",	// Confraternização Universal - Lei nº 662, de 06/04/49
		"Dia do Trabalhador: 15/01",	// Dia do Trabalhador - Lei nº 662, de 06/04/49
		"Tiradentes: 21/04", 		// Tiradentes - Lei nº 662, de 06/04/49
		"Independência: 07/09",		// Dia da Independência - Lei nº 662, de 06/04/49
    		"N. S. Aparecida: 12/10",	// N. S. Aparecida - Lei nº 6802, de 30/06/80
    		"Todos os Santos: 02/11",	// Todos os santos - Lei nº 662, de 06/04/49
    		"Proc. República: 15/11",	// Proclamação da republica - Lei nº 662, de 06/04/49
		"Natal: 25/12"			// Natal - Lei nº 662, de 06/04/49
    	);

	$monthNames = array(
		"janeiro",
		"fevereiro",
		"março",
		"abril",
		"maio",
		"junho",
		"julho",
		"agosto",
		"setembro",
		"outubro",
		"novembro",
		"dezembro"
	);

	$dayNames = array(
		"domingo",
		"segunda",
		"terça",
		"quarta",
		"quinta",
		"sexta",
		"sábado"
	);

    	$myDate = date(d/m/y);
	$myMes  = date(m);
	$myDay  = date(d);
	$myWeak = date(w);
	$myYear = date(Y);
	$myMouth = $monthNames["$myMes"];
	$myWeakName = $dayNames["$myWeak"];

	echo "$myWeakName, $myDay de $myMouth de $myYear";
        echo "<div style='text-align:center';>";
        echo "<form action=\"index.php\" method=\"POST\" >";
        echo "  Informe o ano  : <input type=\"text\" name=\"InputYear\" value=\"$myYear\" />";
        echo "  Informe a URL da imagem  : <input type=\"text\" name=\"InputImg\" value=\"$myImg\" />";
        echo "  <input type=\"submit\" >";
        echo "</form>";
        echo "</div>";
        
        $newYear = $_POST["InputYear"];
	$myImg = $_POST["InputImg"];

        require_once("maxCalendar.class.php");
        $myCelandar = new maxCalendar();
        echo "<div  style='text-align:center;border: 1px solid black;width:750px;box-shadow: 1px 1px 7px;display:table-cell;vertical-align:middle;>";

        echo "<table>";

        echo "<tr><th colspan='1'>";
		echo "<td>";
		echo "<td>&nbsp;</td>";
		echo "<td>";
		echo "<img style='text-aline:center;width:754px;horizontal-aline=center;' src='$myImg' >";
		echo "</td>";
		echo "<td>&nbsp;</td>";
		echo "</td>";
       	echo "</th></tr>";

		echo "</table>";
		
        echo "<table style='border: 1px solid black;box-shadow: 0px 0px 1px;'>";
        echo "<tr><th colspan='3'></th></tr>";
        for ($f=0;$f<=3;$f++){
	        echo "<tr><th colspan='3'>";
            for($i=1;$i<=3;$i++){
                    echo "<td style='text-align:center;border: 1px solid black;height:20px;box-shadow: 1px 1px 7px;'>";
                    $myCelandar->showCalendar($newYear,$i + 3 * $f);
                    echo "</td>";
    				echo "<td>&nbsp;</td>";
            }
        	echo "</th></tr>";
	    echo "<tr><th colspan='3'></th></tr>";
        }
        echo "<tr><th colspan='3'></th></tr>";

        echo "<tr><th colspan='3'>";

   		// Get the Easter Day
	 	$happy = easter_date($newYear);
		$easterDay = date('j', $happy);
		$easterMonth = date('n', $happy);
		echo "<td>* Domingo de Páscoa: $easterDay/$easterMonth</td>";
		echo "<td>&nbsp;</td>";

		//2ºferia Carnaval
		$happy = getdate(mktime(0, 0, 0, $easterMonth, $easterDay  - 48, $newYear)); 
		$happyDay = $happy['mday'];
		$happyMonth = $happy['mon'];
		echo "<td>* 2ª Feira (Carnaval): $happyDay/$happyMonth</td>";
		echo "<td>&nbsp;</td>";

		//3ºferia Carnaval
		$happy = getdate(mktime(0, 0, 0, $easterMonth, $easterDay  - 47, $newYear)); 
		$happyDay = $happy['mday'];
		$happyMonth = $happy['mon'];
		echo "<td>* 3ª Feira (Carnaval): $happyDay/$happyMonth</td>";
		echo "<td>&nbsp;</td>";

      	echo "</th></tr>";
      	echo "<tr><th colspan='3'>";

		//6ºfeira Santa
		$happy = getdate(mktime(0, 0, 0, $easterMonth, $easterDay  - 2 , $newYear)); 
		$happyDay = $happy['mday'];
		$happyMonth = $happy['mon'];
		echo "<td>* Sexta Feira Santa: $happyDay/$happyMonth</td>";
		echo "<td>&nbsp;</td>";

		//Corpus Crist
		$happy = getdate(mktime(0, 0, 0, $easterMonth, $easterDay  + 60, $newYear)); 
		$happyDay = $happy['mday'];
		$happyMonth = $happy['mon'];
		echo "<td>* Corpus Crist: $happyDay/$happyMonth</td>";
		echo "<td>&nbsp;</td>";
		
	    echo "</th></tr>";
		//Datas fixas
		$count = 0;
	    echo "<tr><th colspan='3'>";
		foreach($feriados as $happy){
			$count++;
			if($count <= 3){
				echo "<td>* $happy</td>";
				echo "<td>&nbsp;</td>";
			} else {
				$count = 0;
			    echo "</th></tr>";
			    echo "<tr><th colspan='3'>";
			}
		}
		echo "<td>&nbsp;</td>";
	    echo "</th></tr>";

	    echo "<tr><th colspan='3'>";
       	echo "</th></tr>";

    	echo "</table>";
    	
    	echo "</div>";
?>

