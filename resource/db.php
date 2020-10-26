<?php
$link = mysqli_connect("127.0.0.1", "root", "", "train_reservation_system");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$USERNAME = $_POST['USERNAME'];
$FIRSTNAME = $_POST['FIRSTNAME'];
$LASTNAME =$_POST['LASTNAME'];
$EMAIL = $_POST['EMAIL'];
$CONTACT_NO = $_POST['CONTACT_NO'];
$PASSWORD = $_POST['PASSWORD'];
$GENDER = $_POST['GENDER'];
$sql="INSERT INTO account_info (USERNAME,PASSWORD,FIRSTNAME,LASTNAME,GENDER,CONTACT_NO,EMAIL)
            VALUES('$USERNAME','$PASSWORD','$FIRSTNAME', '$LASTNAME','$GENDER',$CONTACT_NO,'$EMAIL')";
$r=$link->query($sql);
if($r)
{
    echo "<h1>Account Created<h1>";
}
else
{
    echo " not inserted";
}	
	header("refresh:2; url=registration.html");

if(mysqli_query($link,$sql))
{
    echo "<h1>Account Created<h1>";
}
?>

<?php
$link = mysqli_connect("127.0.0.1", "root", "", "example");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$First_Name = $_POST['First_Name'];
$Last_Name =$_POST['Last_Name'];
$DOB = $_POST['DOB'];
$Mobile_no = $_POST['Mobile_no'];
$Email_id =$_POST['Email_id '];
$User_id =$_POST['User_id '];
$Password = $_POST['Password'];


$sql="INSERT INTO store_details (First_Name,Last_Name,DOB,Mobile_no,Email_id, User_id,Password)
            VALUES('$First_Name', '$Last_Name','$DOB','$Mobile_no','$Email_id','$User_id','$Password')";
$r=$link->query($sql);
if($r)
{
    echo "<h1>Account Created<h1>";
}
else
{
    echo " not inserted";
}	
	header("refresh:2; url=index.html");

if(mysqli_query($link,$sql))
{
    echo "<h1>Account Created<h1>";
}
?>
