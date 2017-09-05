<?php
session_start();
function getrekt() {
    $servername = "localhost";
    $username = "root";
    $password = "rootpass";
    $dbname = 'mydb';
    // Create connection
    global $conn;
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "failed";
    } 
    $mail_query = "SELECT Correo_Electronico,Nombre_Tutor FROM Usuario WHERE Correo_Electronico = '";
    $mail_query .= $_POST['mail'];
    $mail_query .="' AND Password = '";
    $mail_query .=$_POST['pass'];
    $mail_query .="'";

    $squery = $conn->query($mail_query);
    if($squery->num_rows)
    {
        while($row = mysqli_fetch_row($squery))
        {
            $_SESSION['usr'] = $row[1];
        }
        
        echo 'Success';
    }
    else echo 'Failed';
}

if($_POST['fun']=="mail")
{
    echo getrekt();
}

?>
