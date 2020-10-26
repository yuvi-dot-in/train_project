<?php
      session_start();
$link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$user = $_POST['username'];
$pass = $_POST['password'];
$query="select username,password from account_info";
$flag = false;

if ( $result=mysqli_query($link, $query)) {
		  /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
       if($row[0]==$user)
        {  if($row[1]==$pass) 
        {
            $flag = true;
            echo "<h1 style='text-align:centert'> Hello ".$row[0]."-Login successfull</h1>";
            header("refresh:2; url=reservation.html"); 
        }
        }
    }
    if(!$flag){
        echo "Login Fail";
    }
}
?> 