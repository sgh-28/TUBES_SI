<?php
    $conn = new mysqli("localhost","root", "", "tubes");
    if($conn->connect_error){
        die("Connection Failed : " + $conn->connect_error);
    }
?>