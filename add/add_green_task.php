<?php
$F_Name=$_POST['F_Name'];
$L_Name=$_POST['L_Name'];
$Username=$_POST['Username'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$Added_ID="0";
$Status="GTF";
$Active="1";

$pass=md5($cpassword);

if (empty($F_Name) || empty($L_Name) || empty($Username) || empty($password) || empty($cpassword)){
    echo "Can not save empty Data";
}else{
   if ($password==$cpassword){
       include '../connection.php';

       $query=$db->query("INSERT INTO users(U_ID,U_Name,F_Name,L_Name,password,Active,Status,Added_ID) VALUES ('','$Username','$F_Name','$L_Name','$pass','$Active','$Status','$Added_ID')");
       if ($query){
           echo $msg="Successfully registered";
           echo "<script>window.top.location='login.php?msg=$msg'</script>";
       }else{
           echo "Can not save data in database";
       }
   }else{
       echo "Passwords are not Matched";
   }
}

?>
