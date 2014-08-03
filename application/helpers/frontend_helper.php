<?php
	function fullName_helper($fname,$mname,$lname,$format){
		if ($format == 1) {
			return $fname." ".$mname[0].". ".$lname;
		}if ($format == 2) {
			return $lname.", ".$fname." ".$mname[0].".";
		} else {
			return $fname." ".$mname." ".$lname;
		}
	}
	function degree_helper($course,$yearlevel) {
		return $course." ".$yearlevel;
	}
	function description($bday, $age, $address, $contact_num) {
		$desc = "";
		if ($bday) {
			$desc = $desc . "I was born on " . strftime("%B %e, %g", strtotime($bday)) . ". ";
		}
		if ($age) {
			$desc = $desc . "I'm " . $age . " years of age. ";
		}
		if ($address) {
			$desc = $desc . "I live in " . $address.". ";
		}
		if ($contact_num) {
			$desc = $desc . "You can reach me by phone " . $contact_num . ". ";			
		}
		$desc = $desc . " You can shoot me an email below.";		
		return $desc;
	}
?>