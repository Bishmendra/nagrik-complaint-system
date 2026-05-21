<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "citizen_complaint"
);

if(!$conn){
    die("Connection Failed");
}
?>