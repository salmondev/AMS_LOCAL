<?php 

    $connect = mysqli_connect("localhost", "root", "", "amsappne_nfc");
	mysqli_set_charset($connect,'utf8'); 

	$HISTORY_RID = '1234';
	$HISTORY_ASSET_ID = '4321';

    $sql = "INSERT INTO HISTORY_ASSET (HISTORY_RID,HISTORY_ASSETID) VALUES ($HISTORY_RID,'{$HISTORY_ASSET_ID}')"; 
	$result = mysqli_query($connect,$sql);

	$lastid = mysqli_insert_id($connect);
	echo $lastid;

?>
