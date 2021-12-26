<?php
$term = $_GET['term'];
$conn = mysql_connect("localhost","root","");
mysql_select_db("borang");

$sql = "SELECT * FROM masterdosens WHERE nip LIKE '%$term%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['nip']." (".$rs['nama'].") " ,
		'value' => $rs['nip'],
		'namaDosen' => $rs['nama'],
	);
}
header("Content-Type: application/json");
echo json_encode($json);
?>