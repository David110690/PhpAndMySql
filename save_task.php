<?php

include("db.php"); 

if (isset($_POST['save_task'])){          
    $title = $_POST["title"]; 
    $descripcion  = $_POST["descripcion"];
    $query = "INSERT INTO task(titulo, descripcion) VALUES ('$title', '$descripcion')";
    $result = mysqli_query($conn, $query); 
    
    if (!$result){   
        die("Query Failed");
   }

   $_SESSION['message'] = 'Mensaje guardado'; 
   $_SESSION['message_type'] = 'success';
   header("Location: index.php");     
}  
?>