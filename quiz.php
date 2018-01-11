<?php

//	echo $_GET["data"];

	$data = explode(",", $_GET["data"]);
	print_r($data);

	function updateResults($student, $results){
		$file = 'results/'.$student.'.txt';
		$contents = implode(",",$results);
		if(!is_file($file)){
			file_put_contents($file,$contents);
		} else {
			$sfile = fopen($file, "w") or die("Unable to open file: ".$file);
			fwrite($sfile, $contents);
			fclose($sfile);
		}
	}

	updateResults($data[0],$data);

?>