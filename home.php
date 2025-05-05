<?php

session_start();
if(!$_SESSION['id'])
{
    $msg="Session Not Started";
    echo "<script>window.top.location='login.php?msg=$msg'</script>";

}
?>
<?php
include 'connection.php';
$id=$_SESSION['id'];
$getdetails=$db->query("SELECT * FROM users WHERE U_ID='$id'");
$val= $getdetails->fetch_assoc();

$ch=$val['Status'];

if($ch=="1")
{

    echo "<script language='javascript'>window.location.href='Admin/index.php'</script>";
}
else if($ch=="3"){
    echo "<script language='javascript'>window.location.href='garbagestaff/index.php'</script>";
}
else if($ch=="2"){
    echo "<script language='javascript'>window.location.href='barangaystaff/index.php'</script>";
}
else{
    echo "<script language='javascript'>window.location.href='user/index.php'</script>";
}



?>
            
            