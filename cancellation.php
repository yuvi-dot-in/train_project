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

    
    <?php
    $link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $enum=$_POST['eticket'];
    $tfare='';
    $fare="select total_fare from train where train_number=(select train_number from train_status where e_ticket_number={$enum})";
        $query2="delete from train_status where e_ticket_number='{$enum}'";
        $query3="delete from passenger where eticket_number={$enum}";
        $query4="delete from book where e_ticket_number='{$enum}'";
        $query5="delete from make_payment where e_ticket_number={$enum}";
        $query6="delete from payment where e_ticket_number={$enum}";

         
        //  if (mysqli_query($link,$query)) 
		  /* fetch associative array */
              if($result=mysqli_query($link,$fare)){
    while ($row = mysqli_fetch_row($result)) {
         $tfare=$row[0];
        echo $tfare;
$query="insert into cancel(e_ticket_number) values($enum)";
$query1="insert into cancellation(e_ticket_number,refunded_amount) values ($enum,$tfare)";
        
    if (!mysqli_query($link,$query))
    {
        echo'not cancelled';
    }
    /*if (!mysqli_query($link,$query1))
    {
        echo'not cancelled 2';
    }*/
        if(mysqli_query($link,$query4)){
        echo'<h1>booking is cancelled</h1>';
    }
     if(mysqli_query($link,$query5)){
        echo'<h1>payment is cancelled</h1>';
    }
        if(mysqli_query($link,$query6)){
        echo'</h1>amount is refunded</h1>';
            echo "<br><h1>Refunded amount is:'{$tfare}'</h1>"; 
    }
        if(mysqli_query($link,$query2)){
        echo'<br><h1>Train status is Cleared</h1>';
    }
        if(mysqli_query($link,$query3)){
        echo'<br><h1>Passenger details cleared</h1>';
    }
    
    }}
    
     /* close connection */
    mysqli_close($link);
        
?>