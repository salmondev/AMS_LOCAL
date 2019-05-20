<div style="margin:60px;">
 
<?php
$matcher = $_REQUEST['matcher'];
$file = "00_test_readcsv_records.csv";
$fp = fopen($file, r);
 
//Finding the position of fieldnames from Row 1
$fieldnames = fgetcsv($fp, 1000, '#');
$scodeindex = array_search("scode", $fieldnames);
$firstnameindex = array_search("firstname", $fieldnames);
$lastnameindex = array_search("lastname", $fieldnames);
$companynameindex = array_search("companyname", $fieldnames);
$introindex = array_search("intro", $fieldnames);
echo "<p><b>Fieldnames of Row 1 have been read and identified:</b>
<br>Scodeindex = " .$scodeindex.
"<br>Firstnameindex = " .$firstnameindex.
"<br>Lastnameindex = " .$lastnameindex.
"<br>Companynameindex = " .$companynameindex.
"<br>Introindex = " .$introindex.
"<br>==END OF READING Fieldnames on ROW 1==</p>";
 
//Finding elements of the matched record
while ($row = fgetcsv($fp, 1000, '#')) {
if ( strtolower($row[$scodeindex]) == strtolower($matcher) ) {
$firstname = $row[$firstnameindex];
$lastname = $row[$lastnameindex];
$companyname = $row[$companynameindex];
$intro = $row[$introindex];
break;
}
}
fclose($fp);
?>
<p>PRINTING ELEMENTS OF THE MATCHED RECORD</p>
<?php
echo "<br>First name = " . $firstname;
echo "<br>Last name = " . $lastname;
echo "<br>Company name = " . $companyname;
echo "<br>Introduction = " . $intro;
?>
</div>
