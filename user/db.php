<?php
$connection=mysqli_connect ("localhost", 'root', '','cmc');
if (!$connection) {
    die('Not connected : ' . mysqli_connect_error());
}
?>
<?php
ob_start(); 

$timezone = date_default_timezone_set("Europe/London");

$con = mysqli_connect("localhost", "root", "", "cmc"); 

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>