<?php
$term = $_GET['term'];
$conn = mysql_connect("localhost","root","");
mysql_select_db("borang");

$sql = "SELECT * FROM mastermatakuliahs WHERE idmatakuliah LIKE '%$term%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['idmatakuliah']." (".$rs['namaMataKuliah'].") ",
		'value' => $rs['idmatakuliah'],
		'namaMataKuliah' => $rs['namaMataKuliah'],
	);
}
header("Content-Type: application/json");
echo json_encode($json);
?>