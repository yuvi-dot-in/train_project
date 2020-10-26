<!DOCTYPE html>
<html>
<style>
	 body {
        background-image:url("railway10.jpg");
        
    }
tr th{
	font-weight:bold;
    }
tr th, tr td{
	padding:5px;
}
th{
    border: 5px solid #C1DAD7;
}
td{
	border: 5px solid #C1DAD7;
}
.c1{
	background:#4b8c74;
}
.c2{
	background:#74c476;
}
.c3{
	background:#a4e56d;
}
.c4{
	background:#cffc83;
	}
	#table{
		margin: auto;
	}
    .tyr{
        padding-top: absolute;
    }
</style>
    <body>
<table id="table" border="2px" id="table">
<tr>
<th class="c3">ETICKET_NUMBER</th>
<th class="c4">FIRST NAME</th>
    <th class="c3">LAST NAME</th>
    <th class="c4">GENDER</th>
    <th class="c3">DATE OF BIRTH</th>
    <th class="c4">DATE OF JOURNEY</th>
    <th class="c3">SEAT NUMBER</th>
    <th class="c4">CONTACT NUMBER</th>
</tr>
<tr>
<?php
session_start();
$fare=$_SESSION['tfare'];
$ticket=$_SESSION['eticket'];
$flightNum=$_SESSION['fnum'];
$transactionid=rand(1111111111,9999999999);
$link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
        $query = "SELECT * from passenger where eticket_number='{$ticket}'";
	  if ($result = mysqli_query($link, $query)) {
		  /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        
    echo "<h1 style='text-align:center;'>--------PASSENGER DETAILS---------</h1>";
    echo"<td class='c3'>";
	echo $row[0];
	echo"</td>";
	echo"<td class='c3'>";
    echo $row[1];
	echo"</td>";
	echo"<td class='c3'>";
	echo $row[2];
	echo"</td>";
	echo"<td class='c4'>";
	echo $row[3];
	echo"</td>";
	echo"<td class='c3'>";
    echo $row[4];
    echo"</td><td class='c4'>";
    echo $row[5];
    echo"</td><td class='c3'>";
    echo $row[7];
    echo"</td><td class='c4'>";
    echo $row[8];
    echo "</td></tr>";
	
      }
  
$sql1="INSERT INTO payment (TRANSACTIONID,TOTAL_FARE_GENERATED) VALUES($transactionid,$fare)";
$sql2="INSERT INTO book (TRAIN_NUMBER,E_TICKET_NUMBER) VALUES('$trainNum',$ticket)";
$sql3="INSERT INTO make_payment (TRANSACTIONID,E_TICKET_NUMBER) VALUES($transactionid,$ticket)";

if(mysqli_query($link,$sql1))
{
    echo "<h1>PAYMENT DONE SUCCESSFULLY!<h1>";
    
}
else
{
    //echo "<h1>PAYMENT IS UNSUCCESSFUL</h1>";
}
if(mysqli_query($link,$sql2))
{
    echo "<h1>BOOKING IS SUCCESSFUL!<h1>";
    
}
if(!mysqli_query($link,$sql3))
{
    //echo "<h1>Error!<h1>";
    
}
        	header("refresh:5; url=home.html");}

?>
    </body>
</html>