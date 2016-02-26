<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="author" lang="fr" content="omar KENNOUCHE">
	<title>Calendar | @topdeveloppement</title>
	<link rel="stylesheet" type="text" href="reset.css">
	<link rel="stylesheet" type="text" href="styles.css">
</head>
<body>
	<?php
		require_once ('date.php');//Integration de la page "date.php", qui contient la classe Date();
		$date = new Date();//Instanciation de ma class Date
		$date_Year = new DateTime('now');//Instanciation de la class DateTime() avec en parametre la date courante 
		$year = $date_Year->format('Y');//Formatage de l'année sur l'Objet $date_Year pour la recupere l'année sous forme d'entier
		$dates = $date->calendar($year);//Appel de ma fonction calendar() de l'Objet $date qui et l'instance de la classe Date()
		$month_Fr = $date->months;//Appel du tableau des mois en francais de l'Objet $date sous forme de chaine de caracter
		$days_Fr = $date->days;//Appel du tableau des jours en francais de l'Objet $date sous forme de chaine de caracter
 	?>
 	<!-- Wrapper global calendar -->
 	<div class="wrapper_calendar">
	 	<?php foreach ($dates as $y => $m):?>
	 		<div class="calendar_years">
		 		<div class="last">
		 			<a href="index.php">
		 				<img src="icon/last_year.png" alt="symbole_last">
		 				<span><?php echo $y - 1; ?></span>
		 			</a>
		 		</div>
		 		<h1 class="title_year"><?php echo $y; ?></h1>
		 		<div class="next">
		 			<a href="index.php">
		 				<img src="icon/next_year.png" alt="symbole_next">
		 				<span><?php echo $y + 1; ?></span>
		 			</a> 
		 		</div>
	 		</div>
		 		<?php foreach ($m as $number_Of_Months => $d):?>
		 			<table class="calendar">
			 			<caption class="calendar_months">
			 				<div class="months">
			 					<?php echo ucfirst($month_Fr[$number_Of_Months]) ?>
			 				</div>
			 				<?php echo "<div class=\"up_and_down\" id=\"".$month_Fr[$number_Of_Months]."\"><div>";?>
			 			</caption>
				 			<thead class="wrapper_dayweek">
								<tr>
									<?php for ($i=1; $i <= 7; $i++) { 
										echo "<th>".ucfirst($days_Fr[$i])."</th>";
									}?>	
								</tr>
							</thead>
							<tbody class="wrapper_days">
								<tr>
									<?php foreach ($d as $day_Of_Month => $day_Of_Week) {
										if($day_Of_Month == 1 && $day_Of_Week != 1){
											for($i=1; $i<$day_Of_Week;$i++){ 
												echo "<td class=\"days--empty\"></td>";
											}
										}
									echo "<td class=\"days\"><strong class=\"day--number\">".$day_Of_Month."</strong></td>";
									$Number_Of_Days_In_The_Month = cal_days_in_month(CAL_GREGORIAN, $number_Of_Months, $year);//nombre de jours dans le mois
										if($day_Of_Month == $Number_Of_Days_In_The_Month && $day_Of_Week != 7){
											for($day_Of_Week; $day_Of_Week < 7; $day_Of_Week++){
												 echo "<td class=\"days--empty\"></td>";
											}
										}
									if($day_Of_Week == 7 && $day_Of_Month != $Number_Of_Days_In_The_Month){echo "</tr><tr>";}	
									}?>
								</tr>
							</tbody>
					</table>
				<?php endforeach ?>	
	 	 <?php endforeach ?>
	</div>
	<!-- End Wrapper global calendar -->
</body>
</html>