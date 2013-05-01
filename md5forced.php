<?php
include './sql_class.php';
include './sql_statement.php';

$counter = 0;
$insterted = 0;
$low = 1;
$dbh = new SQL_Class("phpMYfive");

while (loop) {
	
	$l = rand($low, 6);
	$arr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
				'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	$str = 	$arr[rand(1, 36)].$arr[rand(1, 36)].$arr[rand(1, 36)].$arr[rand(1, 36)].
			$arr[rand(1, 36)].$arr[rand(1, 36)];
	
	$new = "";
	for ($i=0; $i<$l; $i++)
		$new .= $str[$i];
	
		
	$q = "SELECT COUNT(*) FROM t".$l." WHERE str = '".$new."'";
	$stmt = $dbh->execute($q);
	$c = $stmt->sql_result();
	
	if ($c == 0) {
		$dbh->execute("INSERT INTO t".$l." SET str='".$new."', hash='".md5($str)."'");
		$counter++;
	}
	
	if ( $counter % 100 == 0 ) {
		if (full_check($low, $dbh, $arr) == true)
			$low++;
        for($i=0;$i<6;$i++)
            show_prog($dbh, $i);
	}
    echo $counter." found and hashed...\r";
} // Loop end
	
function full_check($low, $dbh, $arr) {
	$stmt = $dbh->execute("SELECT COUNT(*) FROM t".$low);
	$t_count = $stmt->sql_result();
	if ($low == log($t_count, sizeof($arr)))
		return true;
	else 
		return false;		
}

function show_prog($dbh, $level) {
    $tot = array(36, 1296, 46656, 1679616, 60466176, 2176782336);
    if ($level == 0)
        echo"-------------------------\n";
    $t = $level + 1;
    $stmt = $dbh->execute("SELECT COUNT(*) FROM t".$t);
    echo "t".$t." is ".round(($stmt->sql_result() / $tot[$level] * 100), 5)."% completed\n";
}
?>
