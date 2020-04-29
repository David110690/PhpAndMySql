<?php

        include("db.php");  
        if (isset($_GET["id"])){ 
            $id = $_GET["id"]; 
            $query = "SELECT * FROM task WHERE id = $id"; 
            $result = mysqli_query($conn, $query); 
            if (mysqli_num_rows($result) == 1){  
                $row = mysqli_fetch_array($result); 
                $title = $row["titulo"]; 
                $descripcion = $row["descripcion"];               
            }
        }

        if (isset($_POST["update"])){
            $id = $_GET["id"];
            $title = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];

            $query = "UPDATE task set titulo = '$title', descripcion = '$descripcion' WHERE id=$id";
            mysqli_query($conn, $query);
            header("Location: index.php");            
            }
?>


<?php include("includes/header.php")?>

<div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit_task.php?id=<?php echo $_GET["id"]; ?>" method="POST"> 
                        <div class="form-group">
                            <input type="text" name="titulo" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">                        
                        </div>
                        <div class="form-group">
                            <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" placeholder="Update Descripcion">                        
                        </div>
                        <button class="btn btn-primary" name="update">
                            Update
                        </button>                    
                    </form>                
                </div>            
            </div>        
        </div>
</div>
<?php include("includes/footer.php")?>