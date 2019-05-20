<?php
    header ('Content-type: text/html; charset=utf-8');
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = hash("sha512", $password);

    $conn = mysqli_connect("localhost", "root", "", "amsappne_nfc");

    $sql = "SELECT * FROM USER INNER JOIN REFER ON USER.REFERID = REFER.REFERID WHERE USER_USERNAME='$username'";
    mysqli_set_charset($conn,'utf8');
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    $response = mysqli_query($conn, $sql);
    mysqli_set_charset($conn,'utf8');
    mysqli_query($conn,"SET CHARACTER SET UTF8");

    $result = array();
    $result['count'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {

        if ($row = mysqli_fetch_assoc($response) ) {
            
            $sql = "SELECT COUNT(1) FROM ASSET";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['ASSET_COUNT'] = $num;

    		$sql = "SELECT COUNT(1) FROM DEPARTMENT";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['DEPARTMENT_COUNT'] = $num;

    		$sql = "SELECT COUNT(1) FROM STATUS";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['STATUS_COUNT'] = $num;

    		$sql = "SELECT COUNT(1) FROM REFER";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['REFER_COUNT'] = $num;

    		$sql = "SELECT COUNT(1) FROM LOCATION";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['LOCATION_COUNT'] = $num;

    		$sql = "SELECT COUNT(1) FROM HISTORY_ASSET";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['HISTORY_ASSET_COUNT'] = $num;

			$sql = "SELECT COUNT(1) FROM HISTORY_ASSET_RECENT1";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['HISTORY_ASSET_RECENT_COUNT'] = $num;

			$sql = "SELECT COUNT(1) FROM HISTORY_IMAGE";
    		$response = mysqli_query($conn, $sql);
    		$row = mysqli_fetch_row($response);
			$num = $row[0];
			$index['HISTORY_IMAGE_COUNT'] = $num;

            array_push($result['count'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($conn);

        }

    }

}

?>﻿