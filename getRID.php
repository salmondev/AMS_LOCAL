<?php
$connect = mysqli_connect("localhost", "root", "", "amsappne_nfc");
mysqli_set_charset($connect,'utf8'); 

    $sql1 = "SELECT HISTORY_RID FROM HISTORY_ASSET ORDER BY HISTORY_RID DESC LIMIT 1";  
	$result = mysqli_query($connect,$sql1); 

	while($row = mysqli_fetch_array($result)){
		echo $row['HISTORY_RID'] + 1;
	}

	//echo "test";
	//print_r($result);
?>
