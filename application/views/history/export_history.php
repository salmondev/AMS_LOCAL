<?php  
$connect = mysqli_connect("localhost", "root", "", "amsappne_nfc");
mysqli_set_charset($connect,'utf8');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>HISTORY</title>


	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
	<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>

	<style>
		body {
			margin: 2em;
		}

		td:last-child {
			text-align: center;
		}

	</style>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

</head>

<body>

	<div class="alert alert-danger" role="alert"><strong>Warning! </strong> AMS export function still BETA version.
	</div>
	<!--<a class="btn btn-success" style="float:left;margin-right:20px;" href="https://codepen.io/collection/XKgNLN/" target="_blank">Other
		examples on Codepen</a>-->
	<!--<a class="btn btn-success" style="float:left;margin-right:20px;" href="#" target="_blank">IMPORT CSV</a>
		<button  type="button"  onclick="goBack();" class="btn btn-danger">
            		Back
            	</button>-->
	</br>
	</br>
	
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>HISTORY RID</th>
						<th>HISTORY ASSETID</th>
						<th>HISTORY ASSET NAME</th>
						<th>HISTORY RECEIVEDATE</th>
						<th>HISTORY SPEC</th>
						<th>HISTORY UNITNAME</th>
						<th>HISTORY STATUS NAME</th>
						<th>HISTORY REFERID</th>
						<th>HISTORY REFERNAME</th>
						<th>HISTORY BUILDING ID</th>
						<th>HISTORY BUILDING NAME</th>
						<th>HISTORY FLOOR ID</th>
						<th>HISTORY ROOM ID</th>
						<th>HISTORY DAY</th>
						<th>HISTORY MONTH</th>
						<th>HISTORY YEAR</th>
						<th>HISTORY HOUR</th>
						<th>HISTORY MINUTE</th>
						<th>HISTORY USERNAME</th>
					</tr>
				</thead>
				<?php foreach($history as $H){ ?>
				<tr>
					<td><?php echo $H['HISTORY_RID']; ?></td>
					<td><?php echo $H['HISTORY_ASSETID']; ?></td>
					<td><?php echo $H['HISTORY_ASSET_NAME']; ?></td>
					<td><?php echo $H['HISTORY_RECEIVEDATE']; ?></td>
					<td><?php echo $H['HISTORY_SPEC']; ?></td>
					<td><?php echo $H['HISTORY_UNITNAME']; ?></td>
					<td><?php echo $H['HISTORY_STATUS_NAME']; ?></td>
					<td><?php echo $H['HISTORY_REFERID']; ?></td>
					<td><?php echo $H['HISTORY_REFERNAME']; ?></td>
					<td><?php echo $H['HISTORY_BUILDING_ID']; ?></td>
					<td><?php echo $H['HISTORY_BUILDING_NAME']; ?></td>
					<td><?php echo $H['HISTORY_FLOOR_ID']; ?></td>
					<td><?php echo $H['HISTORY_ROOM_ID']; ?></td>
					<td><?php echo $H['HISTORY_DAY']; ?></td>
					<td><?php echo $H['HISTORY_MONTH']; ?></td>
					<td><?php echo $H['HISTORY_YEAR']; ?></td>
					<td><?php echo $H['HISTORY_HOUR']; ?></td>
					<td><?php echo $H['HISTORY_MINUTE']; ?></td>
					<td><?php echo $H['HISTORY_USERNAME']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Row information</h4>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
	<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
	<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
	<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
	<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
	<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
	<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>

	<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>
	<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>



	<script>
		$(document).ready(function () {
			//Only needed for the filename of export files.
			//Normally set in the title tag of your page.
			document.title = 'HISTORY Data';
			// DataTable initialisation
			$('#example').DataTable({
				"dom": '<"dt-buttons"Bf><"clear">lirtp',
				"paging": true,
				"autoWidth": true,
				"columnDefs": [{
					"orderable": false,
					"targets": 5
				}],
				"buttons": [
					'colvis',
					'copyHtml5',
					'csvHtml5',
					'excelHtml5',
					{
						extend: 'pdfHtml5',
						messageTop: 'HISTORY',
						filename: 'HISTORY_PDF',
						charset: 'utf-8',
						bom: 'true'
					},
					'print'
				]
			});
			//Add row button
			$('.dt-add').each(function () {
				$(this).on('click', function (evt) {
					//Create some data and insert it
					var rowData = [];
					var table = $('#example').DataTable();
					//Store next row number in array
					var info = table.page.info();
					rowData.push(info.recordsTotal + 1);
					//Some description
					rowData.push('New Order');
					//Random date
					var date1 = new Date(2016, 01, 01);
					var date2 = new Date(2018, 12, 31);
					var rndDate = new Date(+date1 + Math.random() * (date2 -
						date1)); //.toLocaleDateString();
					rowData.push(rndDate.getFullYear() + '/' + (rndDate.getMonth() + 1) + '/' +
						rndDate.getDate());
					//Status column
					rowData.push('NEW');
					//Amount column
					rowData.push(Math.floor(Math.random() * 2000) + 1);
					//Inserting the buttons ???
					rowData.push(
						'<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button><button type="button" class="btn btn-danger btn-xs dt-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'
					);
					//Looping over columns is possible
					//var colCount = table.columns()[0].length;
					//for(var i=0; i < colCount; i++){			}

					//INSERT THE ROW
					table.row.add(rowData).draw(false);
				});
			});
			//Edit row buttons
			$('.dt-edit').each(function () {
				$(this).on('click', function (evt) {
					$this = $(this);
					var dtRow = $this.parents('tr');
					$('div.modal-body').innerHTML = '';
					$('div.modal-body').append('Row index: ' + dtRow[0].rowIndex + '<br/>');
					$('div.modal-body').append('Number of columns: ' + dtRow[0].cells.length +
						'<br/>');
					for (var i = 0; i < dtRow[0].cells.length; i++) {
						$('div.modal-body').append('Cell (column, row) ' + dtRow[0].cells[i]
							._DT_CellIndex.column + ', ' + dtRow[0]
							.cells[i]._DT_CellIndex.row + ' => innerHTML : ' + dtRow[0].cells[i]
							.innerHTML + '<br/>');
					}
					$('#myModal').modal('show');
				});
			});
			//Delete buttons
			$('.dt-delete').each(function () {
				$(this).on('click', function (evt) {
					$this = $(this);
					var dtRow = $this.parents('tr');
					if (confirm("Are you sure to delete this row?")) {
						var table = $('#example').DataTable();
						table.row(dtRow[0].rowIndex - 1).remove().draw(false);
					}
				});
			});
			$('#myModal').on('hidden.bs.modal', function (evt) {
				$('.modal .modal-body').empty();
			});
		});

	</script>




</body>

</html>
