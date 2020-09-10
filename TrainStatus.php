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
		margin: auto;
	}
     .tyr{
        padding-top: absolute;
    }
    
</style>
<body>
	<div class="navigation_bar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a  href="home.html" > Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="account.html">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="passenger.html"> Passenger</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="reservation.html">Online Reservation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="TrainStatus.html">Train Status</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href ="cancellation.html"> Cancel Reservation</a>
    </div>
    
<table id="table" border="2px" id="table">
  <tr>
    <th class="c3">ETICKET NUMBER</th>
    <th class="c4">TRAIN NUMBER</th>
    <th class="c3">ARRIVAL DATE</th>
    <th class="c4">SCHEDULED DEPARTURE TIME</th>
    <th class="c3">SCHEDULED ARRIVAL TIME</th>
    <th class="c4">STATUS</th>
  </tr>
  <tr>
<?php
$link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$enum=$_POST['eticket'];
$query = "SELECT * from train_status where E_TICKET_NUMBER={$enum}";
	  if ($result = mysqli_query($link, $query)) {
		  /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        
    echo "<h1 style='text-align:center;'>--------TRAIN STATUS---------</h1>";
	echo"<td class='c3'>";
	echo $row[6];
	echo"</td>";
	echo"<td class='c4'>";
	echo $row[7];
	echo"</td>";
	echo"<td class='c3'>";
	echo $row[0];
	echo"</td>";
	echo"<td class='c4'>";
	echo $row[1];
	echo"</td>";
	echo"<td class='c3'>";
    echo $row[2];
    echo"</td><td class='c4'>";
    echo $row[5];
    echo"</td></tr>";
    
    }
          
    /* free result set */
    mysqli_free_result($result);
		  /* close connection */
mysqli_close($link);
	  }
     
      
    
    
?>
       <div class="tyr">
      <p><a href="home.html"><input type='button' value='DONE'/></a></p>
      </div>
