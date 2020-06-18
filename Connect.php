<?php
$conn_string="host=ec2-34-197-141-7.compute-1.amazonaws.com port=5432 dbname=damsp8pd7oiggr user=zjcsijktabbqfp password=1cb506bf0f68b32feab40537879a8cf2a70174049d374581f20020832babe5ef";
$dbconn= pg_connect($conn_string);
if (isset($_POST['username'])) {
	# code...
	$username = $_POST['username'];
}

if (isset($_POST['pass'])) {
	# code...
	$pass = $_POST['pass'];
}
$sql = "SELECT * FROM tblACC WHERE _username='".$username."' AND _password='".$pass."'";
$result =pg_query($dbconn, $sql);
$row = pg_num_rows($result);
if ($row==1)
{
	echo "Login success";
}
else
{
	echo "Login failed";
}
?>