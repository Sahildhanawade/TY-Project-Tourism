<?php
session_start();
$no=$_SESSION['no'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$db=pg_connect("host=127.0.0.1 port=5432 user=postgres password=sahil dbname=project ") or die("Could not connect");
if($no==0)
{
$uname=strstr($email,'@',true);
$insert_query = "INSERT INTO users VALUES ('$uname', '$email', '$pass')";
$result = pg_query($db, $insert_query);
if ($result) {
    header("Location:map.php");
    exit();
} else {
    echo "Error: " . pg_last_error($dbcon);
}

}
elseif($no==1)
{
$oname=strstr($email,'@',true);
$insert_query = "INSERT INTO service_pro VALUES ('$oname', '$email', '$pass')";
$result = pg_query($db, $insert_query);
if ($result) {
    header("Location:hotelform.html");
    exit();
} else {
    echo "Error: " . pg_last_error($dbcon);
}
}
pg_close($db);
?>
