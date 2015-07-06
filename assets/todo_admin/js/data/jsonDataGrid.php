<?php
	echo '{ "geonames": [';
	for($i=1;$i<=20000;$i++){
		$a	= $i + 1;
		if($a > 20000){
			echo '{
				"id": "' . $i . '",
				"button": "<button class=\'btn btn-info\'><span class=\'fa fa-edit\'></span></button>",
				"fcodeName": "capital of a political entity",
				"toponymName": "Mexico City",
				"countrycode": "MX",
				"fcl": "P",
				"fclName": "city, village,...",
				"name": "Mexico City",
				"wikipedia": "",
				"lng": -99.12766456604,
				"fcode": "PPLC",
				"geonameId": "test",
				"lat": 19.428472427036,
				"population": 12294193
			}';
		} else {
			echo '{
				"id": "' . $i . '",
				"button": "<button class=\'btn btn-info\'><span class=\'fa fa-edit\'></span></button>",
				"fcodeName": "capital of a political entity",
				"toponymName": "Mexico City",
				"countrycode": "MX",
				"fcl": "P",
				"fclName": "city, village,...",
				"name": "Mexico City",
				"wikipedia": "",
				"lng": -99.12766456604,
				"fcode": "PPLC",
				"geonameId": "test",
				"lat": 19.428472427036,
				"population": 12294193
			},';
		}
	}
	echo "] }";
?>
