<?php

    // Properties
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName= "website";

    // Methods
    $connection = mysqli_connect($servername, $username, $password, $dbName);
    
    // Check connection
    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    // Create database
    //$sql = "CREATE DATABASE website";
    //if ($connection->query($sql) === TRUE) {
    //  echo "Database created successfully";
    //} else {
   //   echo "Error creating database: " . $connection->error;
    //}