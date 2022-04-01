<?php
$action = $_GET['action'];
switch($action)
{
	case "calc":
		$op = $_GET['op'];
		$value = $_GET['cell'];
		if($op == "+") $value = explode(' ', $value);
		else $value = explode($op, $value);
		$result = $value[0].$op.$value[1];
		switch( $op) {
				case "+":
					$result = $value[0]+$value[1];
				break;
				case "-":
					$result = $value[0]-$value[1];
				break;
				case "/":
					if ($value[1] == '0') $result = 'Imp';
					else $result = $value[0]/$value[1];
				break;
				case "*":
					$result = $value[0]*$value[1];
				break;
		}
		$result = "\n\n Resultado : ".$result;
		echo $result;
	break;
}
die();

?>
