<?php

header('Content-type: application/json');
$dieVal = ['1', '2', '3', '4','5','6'];

$diceOne = 0;
$diceTwo = 0;


$passVal = isset($_GET['passVal']) ? (int) $_GET['passVal']:0;
$cstatus = isset($_GET['cstatus']) ? (int) $_GET['cstatus']:0;
$cbalance = isset($_GET['cbalance']) ? (int) $_GET['cbalance']:0;

$win = 0;
if($cstatus == 0){
	
	$openBal = 100;
}else if($cstatus == 1){
	$openBal = $cbalance;
}


for($i=0; $i <=1; $i++){
	
	$randVal = array_rand($dieVal);
	if($i == 0){
		$diceOne = $randVal;
	} else if ($i == 1) {
		$diceTwo = $randVal;
	}
	
}

$total = $diceOne + $diceTwo;

if($passVal == 1 ) {
	
	if($total < 7 ){
	$openBal +=10;
	$win = 1;
	} else {
		$openBal -=10;
	}
}


if($passVal == 2 ) {
	if($total == 7 ){
	$openBal +=10;
	$win = 1;
	} else {
		$openBal -=10;
	}
}

if($passVal == 3 ) {
	//echo "WEW";
	if($total > 7 ){
	$openBal +=10;
	$win = 1;
	} else {
		$openBal -=10;
	}
}


/* 
echo "Dice 1: ".$diceOne. "</br>";
echo "Dice 2: ".$diceTwo. "</br>";

echo "Total : ". $diceOne + $diceTwo; */



$result = [ "dice1" => $diceOne, "Dice2" => $diceTwo, "Total"=>($diceOne + $diceTwo), 'cstatus' => $cstatus, 'openBla' => $openBal, 'Win' => $win];

echo json_encode($result);

?>