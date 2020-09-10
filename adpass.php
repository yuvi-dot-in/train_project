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
<body>
	<div class="navigation_bar">
        <a href="home.html" > Logout</a>
        <a class="active" href="adpass.php"> Passenger</a>
        <a  href ="adcancel.html"> Cancel Reservation</a>
                <a href="admin.html"> Home</a>
    
    </div>
    
<table  border="2px" id="table">
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
$link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

echo "<h1> Avaiable Passenger Details</h1>";
$query = "SELECT * from passenger ";
	  if ($result = mysqli_query($link, $query)) {
		  /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        
	echo"<td class='c3'>";
	echo $row[0];
	echo"</td>";
	echo"<td class='c4'>";
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
    echo"</td><td class='c3'>";
    echo $row[8];
    echo"</td><td>";
	echo  "<a href='adcancel.html'><input type='submit' value='cancel'></a> </td></tr>";
    
    }
          
    /* free result set */
    mysqli_free_result($result);
		  /* close connection */
mysqli_close($link);
	  }
?>
