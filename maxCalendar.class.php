<?php
class maxCalendar{
    function showCalendar($year=0,$month=0){
    date_default_timezone_set('UTC');

	$nameMonth = array(
		"January" 	=> "Janeiro",
		"February" 	=> "Fevereiro",
		"March" 	=> "Março",
		"April" 	=> "Abril",
		"May" 		=> "Maio",
		"June" 		=> "Junho",
		"July" 		=> "Julho",
		"August" 	=> "Agosto",
		"September" 	=> "Setembro",
		"October" 	=> "Outubro",
		"November" 	=> "Novembro",
		"December" 	=> "Dezembro"
	);

    // Get today, reference day, first day and last day info
    if (($year == 0) || ($month == 0)){
       $referenceDay    = getdate();
    } else {
       $referenceDay    = getdate(mktime(0,0,0,$month,1,$year));
    }
    $firstDay = getdate(mktime(0,0,0,$referenceDay['mon'],1,$referenceDay['year']));
	$lastDay  = getdate(mktime(0,0,0,$referenceDay['mon']+1,0,$referenceDay['year']));
	$today    = getdate();

	#Get the Easter Day
 	$easter = easter_date($year);
	$easterDay = date('j', $easter);
	$easterMonth = date('n', $easter);

	$myReferenceDay = $nameMonth[$referenceDay['month']];
	
	// Create a table with the necessary header informations
	echo '<table class="month">';
	echo '  <tr><th colspan="7">'.$myReferenceDay." - ".$referenceDay['year']."</th></tr>";
	echo '  <b><tr class="days" style="color:blue;background-color:rgb(125,255,100);border: 1px solid black;box-shadow: 0px 0px 1px;"><td style="color:red;">Dom</td><td>Seg</td><td>Ter</td><td>Qua</td><td>Qui</td><td>Sex</td><td>Sab</td></tr></b>';

	$cellnum = 0;
	$actday = 0;

	for($j=0;$j<=5;$j++){
			echo "<tr>";
            for($i=0;$i<=6;$i++){
					if($cellnum < $firstDay['wday']){
						echo "<td>&nbsp;</td>";
					} elseif($actday >= $lastDay['mday']){
						echo "<td>&nbsp;</td>";
					} else {
						$actday++;
						if(($actday == date(j)) && ($month == date(n)) && ($i == date(w))){
							if( $i == "0" ){
								if(($month == $easterMonth) && ($actday == $easterDay)){
									echo "<b><td style='text-align:right;color:red;background-color:yellow;' >$actday</td></b>";
								} else {
									echo "<b><td style='text-align:right;color:red;background-color:white;' >$actday</td></b>";
								}
							} else {
								echo "<b><td style='text-align:right;color:blue;background-color:white;' >$actday</td></b>";
							}
						} else {
							if( $i == "0" ){
								if(($month == $easterMonth) && ($actday == $easterDay)){
									echo "<td style='text-align:right;color:red;background-color:yellow;' >$actday</td>";
								} else {
									echo "<td style='text-align:right;color:red;background-color:white;' >$actday</td>";
								}
							} else {
								echo "<td style='text-align:right;color:black;background-color:white;' >$actday</td>";
							}
						}
					}
					$cellnum++;
            }
			echo "</tr>";
	}
	echo "</table>";
  	}

}
?>
