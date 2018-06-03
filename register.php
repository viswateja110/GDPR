<?php
require_once('config.php');

$fname=mysqli_real_escape_string($con,trim($_POST['fname']));
$lname=mysqli_real_escape_string($con,trim($_POST['lname']));
$email=mysqli_real_escape_string($con,trim($_POST['email']));
$mobile=mysqli_real_escape_string($con,trim($_POST['mobile']));
$company=mysqli_real_escape_string($con,trim($_POST['company']));
$position=mysqli_real_escape_string($con,trim($_POST['position']));

if($fname=='' || $lname=='' || $email=='' || $mobile=='' || $company=='' || $position==''){
    echo 'please fill all details';
}
else{
    $sql="SELECT * from users where email='$email'";
    $res=mysqli_query($con,$sql);
    if(!res){
        $sql="INSERT INTO users (fname,lname,email,mobileno,company,position) VALUES('$fname','$lname','$email','$mobile','$company','$position')";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
      }
      else{
          $response="SUCCESS";
          echo $response;
      }
    }else{
        echo "home";
    }
    
}
mysqli_close($con);
header("location: dashboard.php");

?>
