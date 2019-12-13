<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

//for print and embroidery

$order_id=$_POST['orderid'];
$p_number=$_POST['printNumber'];
$p_totalprice=$_POST['printTotalprice'];
$em_number=$_POST['embroideryNumber'];
$em_totalprice=$_POST['embroideryTotalprice'];

$print_em="INSERT INTO print_embroidery(order_id, p_number, p_totalprice,em_number,em_totalprice) VALUES ('$order_id','$p_number','$p_totalprice','$em_number','$em_totalprice')";

$sql1=mysqli_query($con,$print_em);
echo '<br>sql1 :'. mysqli_error($con);


//for fabrication

$fabname1=$_POST['Fname1'];
$fabcomsumption1=$_POST['Fcomsumption1'];
$fabunit1=$_POST['Funit1'];
$fabprice1=$_POST['Fprice1'];
$fabname2=$_POST['Fname2'];
$fabcomsumption2=$_POST['Fcomsumption2'];
$fabunit2=$_POST['Funit2'];
$fabprice2=$_POST['Fprice2'];
$fabname3=$_POST['Fname3'];
$fabcomsumption3=$_POST['Fcomsumption3'];
$fabunit3=$_POST['Funit3'];
$fabprice3=$_POST['Fprice3'];

$fabtotalprice=$fabprice1+$fabprice2+$fabprice3;

$fabrication="INSERT INTO fabrication(order_id, fabname1, fabcomsumtion1,fabunit1,fabprice1,fabname2,fabcomsumtion2,fabunit2,fabprice2,fabname3,fabcomsumtion3,fabunit3,fabprice3,fabtotalprice) VALUES ('$order_id','$fabname1','$fabcomsumption1','$fabunit1','$fabprice1','$fabname2','$fabcomsumption2','$fabunit2','$fabprice2','$fabname3','$fabcomsumption3','$fabunit3','$fabprice3','$fabtotalprice')";

$sql2=mysqli_query($con,$fabrication);
echo '<br>sql2 :'.mysqli_error($con);




//for basic accessories

$bname1=$_POST['InputBname1'];
$bcomsumption1=$_POST['Bcomsumption1'];
$bprice1=$_POST['Bprice1'];
$bsupname1=$_POST['InputBsupname1'];

$bname2=$_POST['InputBname2'];
$bcomsumption2=$_POST['Bcomsumption2'];
$bprice2=$_POST['Bprice2'];
$bsupname2=$_POST['InputBsupname2'];

$bname3=$_POST['InputBname3'];
$bcomsumption3=$_POST['Bcomsumption3'];
$bprice3=$_POST['Bprice3'];
$bsupname3=$_POST['InputBsupname3'];

$bname4=$_POST['InputBname4'];
$bcomsumption4=$_POST['Bcomsumption4'];
$bprice4=$_POST['Bprice4'];
$bsupname4=$_POST['InputBsupname4'];

$bname5=$_POST['InputBname5'];
$bcomsumption5=$_POST['Bcomsumption5'];
$bprice5=$_POST['Bprice5'];
$bsupname5=$_POST['InputBsupname5'];


$bname6=$_POST['InputBname6'];
$bcomsumption6=$_POST['Bcomsumption6'];
$bprice6=$_POST['Bprice6'];
$bsupname6=$_POST['InputBsupname6'];

$bname7=$_POST['InputBname7'];
$bcomsumption7=$_POST['Bcomsumption7'];
$bprice7=$_POST['Bprice7'];
$bsupname7=$_POST['InputBsupname7'];

$bname8=$_POST['InputBname8'];
$bcomsumption8=$_POST['Bcomsumption8'];
$bprice8=$_POST['Bprice8'];
$bsupname8=$_POST['InputBsupname8'];

$btotalprice=$bprice1+$bprice2+$bprice3+$bprice4+$bprice5+$bprice6+$bprice7+$bprice8;

$basic="INSERT INTO basic_accessories(order_id,bname1 ,bcomsumption1,bprice1,bsupname1,bname2,bcomsumption2,bprice2,bsupname2,bname3,bcomsumption3,bprice3,bsupname3,bname4,bcomsumption4,bprice4,bsupname4,bname5,bcomsumption5,bprice5,bsupname5,bname6,bcomsumption6,bprice6,bsupname6,bname7,bcomsumption7,bprice7,bsupname7,bname8,bcomsumption8,bprice8,bsupname8,btotalprice) VALUES ('$order_id','$bname1','$bcomsumption1','$bprice1','$bsupname1','$bname2','$bcomsumption2','$bprice2','$bsupname2','$bname3','$bcomsumption3','$bprice3','$bsupname3','$bname4','$bcomsumption4','$bprice4','$bsupname4','$bname5','$bcomsumption5','$bprice5','$bsupname5','$bname6','$bcomsumption6','$bprice6','$bsupname6','$bname7','$bcomsumption7','$bprice7','$bsupname7','$bname8','$bcomsumption8','$bprice8','$bsupname8','$btotalprice')";

$sql3=mysqli_query($con,$basic);

echo '<br>sql3 :'.mysqli_error($con);

//for decorative

$dname1=$_POST['InputDname1'];
$dcomsumption1=$_POST['Dcomsumption1'];
$dprice1=$_POST['Dprice1'];
$dsupname1=$_POST['InputDsupname1'];

$dname2=$_POST['InputDname2'];
$dcomsumption2=$_POST['Dcomsumption2'];
$dprice2=$_POST['Dprice2'];
$dsupname2=$_POST['InputDsupname2'];


$dname3=$_POST['InputDname3'];
$dcomsumption3=$_POST['Dcomsumption3'];
$dprice3=$_POST['Dprice3'];
$dsupname3=$_POST['InputDsupname3'];

$dname4=$_POST['InputDname4'];
$dcomsumption4=$_POST['Dcomsumption4'];
$dprice4=$_POST['Dprice4'];
$dsupname4=$_POST['InputDsupname4'];

$dname5=$_POST['InputDname5'];
$dcomsumption5=$_POST['Dcomsumption5'];
$dprice5=$_POST['Dprice5'];
$dsupname5=$_POST['InputDsupname5'];

$dname6=$_POST['InputDname6'];
$dcomsumption6=$_POST['Dcomsumption6'];
$dprice6=$_POST['Dprice6'];
$dsupname6=$_POST['InputDsupname6'];

$dname7=$_POST['InputDname7'];
$dcomsumption7=$_POST['Dcomsumption7'];
$dprice7=$_POST['Dprice7'];
$dsupname7=$_POST['InputDsupname7'];

$dname8=$_POST['InputDname8'];
$dcomsumption8=$_POST['Dcomsumption8'];
$dprice8=$_POST['Dprice8'];
$dsupname8=$_POST['InputDsupname8'];

$dtotalprice=$dprice1+$dprice2+$dprice3+$dprice4+$dprice5+$dprice6+$dprice7+$dprice8;

$decorative="INSERT INTO decorative_accessories(order_id,dname1,dcomsumption1,dprice1,dsupname1,dname2,dcomsumption2,dprice2,dsupname2,dname3,dcomsumption3,dprice3,dsupname3,dname4,dcomsumption4,dprice4,dsupname4,dname5,dcomsumption5,dprice5,dsupname5,dname6,dcomsumption6,dprice6,dsupname6,dname7,dcomsumption7,dprice7,dsupname7,dname8,dcomsumption8,dprice8,dsupname8,dtotalprice) VALUES ('$order_id','$dname1','$dcomsumption1','$dprice1','$dsupname1','$dname2','$dcomsumption2','$dprice2','$dsupname2','$dname3','$dcomsumption3','$dprice3','$dsupname3','$dname4','$dcomsumption4','$dprice4','$dsupname4','$dname5','$dcomsumption5','$dprice5','$dsupname5','$dname6','$dcomsumption6','$dprice6','$dsupname6','$dname7','$dcomsumption7','$dprice7','$dsupname7','$dname8','$dcomsumption8','$dprice8','$dsupname8','$dtotalprice')";

$sql4=mysqli_query($con,$decorative);
echo '<br>sql4 :'.mysqli_error($con);

//for finishing accessories

$fname1=$_POST['InputFiname1'];
$fcomsumption1=$_POST['Ficomsumption1'];
$fprice1=$_POST['Fiprice1'];
$fsupname1=$_POST['InputFisupname1'];

$fname2=$_POST['InputFiname2'];
$fcomsumption2=$_POST['Ficomsumption2'];
$fprice2=$_POST['Fiprice2'];
$fsupname2=$_POST['InputFisupname2'];

$fname3=$_POST['InputFiname3'];
$fcomsumption3=$_POST['Ficomsumption3'];
$fprice3=$_POST['Fiprice3'];
$fsupname3=$_POST['InputFisupname3'];

$fname4=$_POST['InputFiname4'];
$fcomsumption4=$_POST['Ficomsumption4'];
$fprice4=$_POST['Fiprice4'];
$fsupname4=$_POST['InputFisupname4'];

$fname5=$_POST['InputFiname5'];
$fcomsumption5=$_POST['Ficomsumption5'];
$fprice5=$_POST['Fiprice5'];
$fsupname5=$_POST['InputFisupname5'];

$fname6=$_POST['InputFiname6'];
$fcomsumption6=$_POST['Ficomsumption6'];
$fprice6=$_POST['Fiprice6'];
$fsupname6=$_POST['InputFisupname6'];

$fname7=$_POST['InputFiname7'];
$fcomsumption7=$_POST['Ficomsumption7'];
$fprice7=$_POST['Fiprice7'];
$fsupname7=$_POST['InputFisupname7'];

$fname8=$_POST['InputFiname8'];
$fcomsumption8=$_POST['Ficomsumption8'];
$fprice8=$_POST['Fiprice8'];
$fsupname8=$_POST['InputFisupname8'];

$ftotalprice=$fprice1+$fprice2+$fprice3+$fprice4+$fprice5+$fprice6+$fprice7+$fprice8;

$finishing="INSERT INTO finishing_accessories(order_id,fname1 ,fcomsumption1,fprice1,fsupname1,fname2,fcomsumption2,fprice2,fsupname2,fname3,fcomsumption3,fprice3,fsupname3,fname4,fcomsumption4,fprice4,fsupname4,fname5,fcomsumption5,fprice5,fsupname5,fname6,fcomsumption6,fprice6,fsupname6,fname7,fcomsumption7,fprice7,fsupname7,fname8,fcomsumption8,fprice8,fsupname8,ftotalprice) VALUES ('$order_id','$fname1','$fcomsumption1','$fprice1','$fsupname1','$fname2','$fcomsumption2','$fprice2','$fsupname2','$fname3','$fcomsumption3','$fprice3','$fsupname3','$fname4','$fcomsumption4','$fprice4','$fsupname4','$fname5','$fcomsumption5','$fprice5','$fsupname5','$fname6','$fcomsumption6','$fprice6','$fsupname6','$fname7','$fcomsumption7','$fprice7','$fsupname7','$fname8','$fcomsumption8','$fprice8','$fsupname8','$ftotalprice')";

$sql5=mysqli_query($con,$finishing);

echo '<br>sql5 :'.mysqli_error($con);









if ($sql1==true && $sql2==true && $sql3==true && $sql4==true && $sql5==true) {
	# code...
   header('location: PreOrderTwo.php');
}














?>