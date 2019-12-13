<?php

$uname=$_POST['uname'];
$pass=$_POST['pass'];

if ($uname==merchandiser && $pass==admin) {
	# code...
	if($uname){
        session_start();
        $_SESSION['uname'] = $uname;
        echo 'Logged in';
	header('location:main.php');
    }
    else{
        echo 'User not found';
    }
}
else{
	echo "You Entered Wrong Username or Password.....!!!!";
}
?>