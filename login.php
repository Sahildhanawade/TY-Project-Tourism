<?php
session_start();
$no=$_SESSION['no'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$db=pg_connect("host=127.0.0.1 port=5432 user=postgres password=sahil dbname=project ") or die("Could not connect");
if($no==0)
{
$uname=strstr($email,'@',true);
$insert_query = "SELECT * FROM users WHERE uname='$uname' AND pass='$pass'";
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
$insert_query = "SELECT * FROM admins WHERE oname='$oname' AND pass='$pass'";
$result = pg_query($db, $insert_query);
}

if ($result) {
    header("Location:admin.php");
    exit();
} else {
    echo "Error: " . pg_last_error($db);
}

pg_close($db);
?>
