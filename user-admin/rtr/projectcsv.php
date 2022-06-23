<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "rtr");


$filename = "project.csv";
$fp = fopen('php://output', 'w');

$query = $_SESSION['query'];
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);
$sql = "SHOW COLUMNS FROM project";
$result = mysqli_query($conn,$sql); 
$a=[];
while($row = mysqli_fetch_array($result)){
    $a[]=$row['Field'];
} 
fputcsv($fp, $a);
$query = $_SESSION['query'];
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>