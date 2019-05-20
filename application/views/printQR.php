<html>

<head>
	<title>Print QR Code</title>

	

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">

</head>

<body style="font-family: 'Sarabun', sans-serif;">


	<?php
$objConnect = mysqli_connect("localhost", "root", "", "amsappne_nfc");
//$objDB = mysqli_select_db($objConnect,"mydatabase");
//$connect = mysqli_connect("localhost", "root", "", "amsappne_nfc");
mysqli_set_charset($objConnect,'utf8');
include('phpqrcode/qrlib.php'); 

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "SELECT * FROM ASSET ";
			$strSQL .="WHERE BARCODE = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);

			$tempPath = "images/";
			$fileName='qr_'.$_POST["chkDel"][$i].'.png';
 			$pngPath = $tempPath.$fileName;
			QRcode::png($_POST["chkDel"][$i],$pngPath,'L',9,2);
			$cm = $_POST["qrsize"][$i];
			$px = ($cm/(2.54/96));
			$font = $cm+12;
			
            
			//while($row = mysqli_fetch_array($objQuery)){
				foreach($objQuery as $row){
			//echo '<img src="http://amsapp.net/images/'.$row['BARCODE'].'.png"/>';
            echo '<style>
			
			.grid-container {
				display: grid;
				grid-template-columns: '.$px.'px 600px;
				/*grid-template-rows: '.$px.'px;*/
				grid-template-areas: "qrpic qrtext";
			}
	
			.qrpic {
				grid-area: qrpic;
				
				text-align: right;
				
				vertical-align: middle;
			}
	
			.qrtext {
				grid-area: qrtext;
				
				text-align: left;
				font-size: 14px;
				vertical-align: middle;
			}
	
			

			.pagebreak {
				page-break-before: always;
			}
	
			body,
			h1,
			h2,
			h3,
			ol,
			ul,
			div {
				width: auto;
				border: 0;
				margin: 0 2%;
				padding: 0;
				float: none;
				position: static;
				overflow: visible;
				vertical-align: middle;
			}
	
			@media print {
				div {
					page-break-inside: avoid;
				}
			}
	
			
	
		</style>';
			echo '<div class="grid-container"><div class="qrpic"><img src="'.base_url('images/qr_'.$row['BARCODE']).'.png" style="width: '.$px.'px;height: '.$px.'px;"></div><div class="qrtext" style="font-size:'.$font.';vertical-align: middle;"></br>'.$row['BARCODE'].'</div></div></br>';
			
			}
		}
		
	}
	

	

mysqli_close($objConnect);
?>
	<div class="pagebreak"> </div>

	<script>
		window.onload = function () {
			window.print();
		}

		

	</script>
</body>

</html>
