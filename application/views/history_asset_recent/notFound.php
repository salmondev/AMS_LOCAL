<?php  
$connect = mysqli_connect("localhost", "root", "", "amsappne_nfc");
mysqli_set_charset($connect,'utf8');


    $dater = $_POST['dater'];
    $asset_status = $_POST['asset_status'];
    $status = $_POST['status'];

    //$sql = "SELECT * from history_asset_recent1 WHERE CONCAT(HISTORY_DAY,'/',HISTORY_MONTH,'/',HISTORY_YEAR) >= '$input' AND HISTORY_STATUS_NAME='' ";
    
    $sql = $asset_status;
    $result = mysqli_query($connect,$sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HISTORY Recent</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>


    <style>
        body {
            margin: 2em;
        }

        td:last-child {
            text-align: center;
        }

        thead input {
            width: 100%;
        }
    </style>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">

</head>

<body style="font-family: 'Sarabun', sans-serif;">

    <h1>ข้อมูลการตรวจสอบครุภัณฑ์ล่าสุด</h1>
    </br>
    </br>
    <h2>ข้อมูลครุภัณฑ์สถานะ : <b><?php  echo $status; ?></b></h2>
    </br>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
						<tr>
							<th>ASSETID</th>
							<th>BARCODE</th>
							<th>REFERIDITEM</th>
							<th>ASSETNAME</th>
							<th>RECEIVEDATE</th>
							<th>SPEC</th>
							<th>UNITNAME</th>
						</tr>
					</thead>
					<?php while($A = mysqli_fetch_array($result)){ ?>
					<tr>
						<td>
							<?php echo $A['ASSETID']; ?>
						</td>
						<td>
							<?php echo $A['BARCODE']; ?>
						</td>
						<td>
							<?php echo $A['REFERIDITEM']; ?>
						</td>
						<td>
							<?php echo $A['ASSETNAME']; ?>
						</td>
						<td>
							<?php echo $A['RECEIVEDATE']; ?>
						</td>
						<td>
							<?php echo $A['SPEC']; ?>
						</td>
						<td>
							<?php echo $A['UNITNAME']; ?>
						</td>
					</tr>
					<?php } ?>
        </table>
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

    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js" type="text/javascript">
    </script>


    <script>
        $(document).ready(function () {

            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
            document.title = 'ข้อมูลการตรวจสอบครุภัณฑ์ล่าสุด';
            // DataTable initialisation
            // Setup - add a text input to each footer cell
            $('#example thead tr').clone(true).appendTo('#example thead');
            $('#example thead tr:eq(0) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="' + title + '" />');

                $('input', this).on('keyup change', function () {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

            var table = $('#example').DataTable({
                "dom": '<"dt-buttons"Bf><"clear">lirtp',
                "paging": true,
                "autoWidth": true,
                "columnDefs": [{
                    "orderable": false,
                }],
                "buttons": [
                    'colvis',
                    'copyHtml5',
                    'csvHtml5',
                    'excelHtml5',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape', //landscape give you more space
                        pageSize: 'A1', //A0 is the largest A5 smallest(A0,A1,A2,A3,legal,A4,A5,letter))
                        messageTop: 'HISTORY',
                        filename: 'HISTORY_PDF',
                        charset: 'utf-8',
                        bom: 'true'
                    },
                    {
                        extend: 'print',
                        customize: function (doc) {
                            $(doc.document.body).find('h1').css('font-size', '12pt');
                            $(doc.document.body).find('table').css('font-size', '10pt');
                            $(doc.document.body).css('font-size', '10px');
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>