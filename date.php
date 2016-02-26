<?php 

	class Date{

		public $months = array(
			1=>'janvier',
			2=>'février',
			3=>'mars',
			4=>'avril',
			5=>'mai',
			6=>'juin',
			7=>'juillet',
			8=>'août',
			9=>'septembre',
			10=>'octobre',
			11=>'novembre',
			12=>'décembre'
			);

		public $days = array(
			1=>'lundi',
			2=>'mardi',
			3=>'mercredi',
			4=>'jeudi',
			5=>'vendredi',
			6=>'samedi',
			7=>'dimanche'
			);

		public function calendar($year){

			$dates = array();

				$date = new DateTime($year.'-01-01');

				while ($date->format('Y') <= $year) {
					$y = $date->format('Y');
					$m = $date->format('n');
					$d = $date->format('j');
					$dW = str_replace('0', '7',$date->format('w'));
					$date->add(new DateInterval('P1D'));
					$dates[$y][$m][$d] = $dW;
				}

			return $dates;
		}
}

	