<?php
session_start();
$DAT=$_SESSION['jdate'];

$link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$FIRSTNAME = $_POST['FIRSTNAME'];
$LASTNAME =$_POST['LASTNAME'];
$CONTACT_NO = $_POST['CNUMBER'];
$DOB = $_POST['DOB'];
$GENDER = $_POST['GENDER'];
$SEAT_NUMBER=$_POST['SEATNUMBER'];
$a='rajeevjswl';
$c='aisa';
$b=$_POST['FIRSTNAME'].'1234';
$ETICKET=rand(100000000,999999999);
$_SESSION['eticket']=$ETICKET;



$sql="INSERT INTO passenger (ETICKET_NUMBER,PFIRSTNAME,PLAST_NAME,PGENDER,DOB,DOJ,BOOKING_USERNAME,SEATNUMBER, PCONTACT_NO,PUSERNAME)
            VALUES($ETICKET,'$FIRSTNAME', '$LASTNAME','$GENDER','$DOB','$DAT','$a','$SEAT_NUMBER','$CONTACT_NO','$b')";
if(mysqli_query($link,$sql))
{
    echo "<h1>Passenger Details  are Recorded<h1>";
    echo "<h2> you are being redirected to.......... Payment Gateway<h2>";
    header("refresh:3; url=payment.html");
}
else
{
    echo $ETICKET;
    echo $FIRSTNAME;
    echo $LASTNAME;
    echo $GENDER;
    echo $DOB;
    echo $DAT;
    echo $a;
    
    echo " not inserted";
}	
	
?>