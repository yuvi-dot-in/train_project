<!DOCTYPE html>
<html>
<style>
	 body {
        background-image:url("railway10.jpg");
        
    }
    .navigation_bar
    {
        
        background-color:yellow;
        border-width: thick;
        border-bottom-style: ridge;
        width: inherit;
        height:50px;
        overflow: hidden;
        
    }
    a{
        text-decoration:none;
        padding:20px;
        font-size: 25px;
    }
   div a:hover{
        color:chartreuse;
        background-color:darkseagreen;
    }
    .active{
        color:indianred;
        background-color: aqua;
    }
    .login
    {
        text-align: center;
        padding:inherit;
        margin-top: 150px;
    }
      .foot{
        float: right;
        background-color: aqua;
        margin-top: 500px;
    }
    #register:hover{
        background-color: 
    }
    
    a:hover {
        color:red;
        
    }
   h3{
        margin-left: 550px;
    }
    
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
		
	}
    .try{
        padding-top: 500px;
        position: absolute;
    }
    
</style>
<div class="navigation_bar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a  href="home.html" > Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="account.html">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="passenger.html"> Passenger</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="reservation.html">Online Reservation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="TrainStatus.html">Train Status</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href ="cancellation.html"> Cancel Reservation</a>
    </div>
    
<table  border="2px" id="table">
  <tr>
    <th class="c1">Train Number</th>
    <th class="c2">Origin</th>
    <th class="c3">Destination</th>
    <th class="c4">Total Seats</th>
    <th> Total Fare</th>
  </tr>
  <tr>
<?php
      session_start();
$link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST['submit'])){
$a=$_POST['arrival'];
$d=$_POST['departure'];
}
echo "<h1> Available Trains from '{$d}' to '{$a}'</h1>";
$date=$_POST['DATE'];
$_SESSION['jdate']=$date; 
$fr='';
$fn='';
$query = "SELECT * from train where origin ='{$d}' and destination='{$a}' ";
	  if ($result = mysqli_query($link, $query)) {
		  /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        
	$fr=$row[4];
    $fn=$row[0];
	echo"<td class='c1'>";
	echo $row[0];
	echo"</td>";
	echo"<td class='c2'>";
	echo $row[1];
	echo"</td>";
	echo"<td class='c3'>";
	echo $row[2];
	echo"</td>";
	echo"<td class='c4'>";
	echo $row[3];
	echo"</td>";
	echo"<td>";
    echo $row[4];
    echo"</td><td>";
	echo  "<a href='passenger.html'><input type='submit' value='book'></a> </td></tr>";
    
    }
          
    /* free result set */
    mysqli_free_result($result);
		  /* close connection */
mysqli_close($link);
	  }
      $_SESSION['tfare']=$fr;
      $_SESSION['fnum']=$fn;
      
    
?>
	</table>
	</body>
</html>