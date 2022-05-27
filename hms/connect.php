<?php
    $firstname = $_POST['firstname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $date = $_POST['date'];
      
    // database connection
    $conn = new mysqli("localhost", "root", "", "hmsdb");
    if($conn ->connect_error)
    {
        die("Failed to connect: ".$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into registration(firstname, number, email, date) values(?,?,?,?)");
        $stmt->bind_param("siss",$firstname, $number, $email, $date);
        $stmt->execute();
        echo "Booked successfully";
        $stmt->close();
        $conn->close();
    }
    
?>