<?php
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$messages = $_POST['messages'];
$uname=strstr($email,'@',true);
$db=pg_connect("host=127.0.0.1 port=5432 user=postgres password=sahil dbname=project ") or die("Could not connect");
$insert_query = "INSERT INTO feedback VALUES ('$uname', '$username', '$email','$subject','$messages')";
$result = pg_query($db, $insert_query);

if ($result) {
    echo"<script>
        alert('Thank you for your feedback! We will get back to you soon.');
        </script>";
} else {
    echo "Error: " . pg_last_error($db);
}

pg_close($db);
?>
