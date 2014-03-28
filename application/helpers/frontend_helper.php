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
	function description($age,$address,$contact_num) {
		return "Im ".$age." and i live in ".$address.". You can reach me by phone ".$contact_num." or shoot me an email below. (ill wait for ya call!)";  
	}
?>