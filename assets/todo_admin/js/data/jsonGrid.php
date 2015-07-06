<?php
	echo '{ "aaData": [';
	for($i=1;$i<=20000;$i++){
		$a	= $i + 1;
		if($a > 20000){
			echo '{
			"engine": "' . $i . '",
			"browser": "Internet Explorer 4.0",
			"platform": "Win 95+",
			"version": "4",
			"grade": "X"
			}';
		} else {
			echo '{
			"engine": "' . $i . '",
			"browser": "Internet Explorer 4.0",
			"platform": "Win 95+",
			"version": "4",
			"grade": "X"
			},';
		}
	}
	echo "] }";
?>
