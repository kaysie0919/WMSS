<?php
$R_ID=$_REQUEST['R_ID'];
$desc=$_POST['desc'];
$location=$_POST['location'];
$img=$_REQUEST['img'];

$name=$_FILES["image"] ["name"];
$type=$_FILES["image"] ["type"];
$size=$_FILES["image"] ["size"];
$temp=$_FILES["image"] ["tmp_name"];
$error=$_FILES["image"] ["error"];

if (empty($name)){

            include '../../connection.php';
            $insert=$db->query("UPDATE reports SET Location='$location',Desciption='$desc', WHERE R_ID='$R_ID'");

            if ($insert) {
                $ms = "Successfully Changed";
                echo "<script>window.top.location='../index.php?msg=$ms'</script>";
            } else {
                $ms = "Something was Wrong! Please Contact System Developer";
                echo "<script>window.top.location='../index.php?msg=$ms'</script>";
            }


}else{


    $extension=strtolower(substr($name,strpos($name, '.') + 1));
    echo $img_No=rand();
    echo $img_link=$img_No.".".$extension;

    if(($extension=='png') || ($extension=='jpg') || ($extension=='jpeg') || ($extension=='JPG')) {

        if (move_uploaded_file($temp, "../../reportimages/".$img_link)) {

            unlink("../../reportimages/".$img);
            include '../../connection.php';
            $insert=$db->query("UPDATE reports SET R_URL='$img_link',Location='$location',Desciption='$desc' WHERE R_ID='$R_ID'");

            if ($insert) {
                $ms = "Successfully Changed";
                echo "<script>window.top.location='../index.php?msg=$ms'</script>";
            } else {
                $ms = "Something was Wrong! Please Contact System Developer";
                echo "<script>window.top.location='../index.php?msg=$ms'</script>";
            }
        }else{

            $ms = "file Not moved to folder";
            echo "<script>window.top.location='../index.php?msg=$ms'</script>";
        }
    }

}


?>