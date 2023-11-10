<?php
    include_once 'DBConnection.php';
    
    // define variables and set to empty values
    $nameErr = $emailErr = $passwordErr = $phoneErr = "";
    $name = $email = $password = $age = $phone = $dateofbirth = $profilepic_location = "";
    
    
    //variables being used
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $dateofbirth = $_POST['dateofbirth'];
    $profilepic_location = $_POST['profilepic_location'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      if (empty($_POST["password"])) {
        $password = "Password is required";
      } else {
        $password = test_input($_POST["password"]);
        // check if password is valid
        if (!preg_match("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}",$website)) {
          $passwordErr = "Password must be atleast 8 or more characters";
        }    
      }

      if (empty($_POST["phone"])) {
        $phone = "Phone number is required";
      } else {
        $phone = test_input($_POST["phone"]);
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
   
    
    
    $sql = "INSERT INTO user (name, email, password, age, phone, dateofbirth, profilepic_location) VALUES ('$name', '$email', '$password', '$age' , '$phone', '$dateofbirth', '$profilepic_location');";
    

    mysqli_query($connection, $sql);

    header("Location: post.php?contact=success");

