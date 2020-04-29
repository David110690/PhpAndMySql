<?php include("db.php")?> 
<?php include("includes/header.php") ?>  

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])){  ?> 
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset(); } ?> 

            <div class="card card-body">
                <form action="save_task.php" method="POST"> 
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder = "Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <div class="form-group">
                       <input type="submit" class="btn btn-primary btn-block" name="save_task" value="SAVE TASK">
                    </div>
                </form>            
            </div>       
        </div>

        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM task";
                            $result_task = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_task)){ ?>
                                <tr>
                                    <td><?php echo $row['titulo'] ?></td>
                                    <td><?php echo $row['descripcion'] ?></td>
                                    <td><?php echo $row['creado'] ?></td>
                                    <td>
                                        <a href="edit_task.php?id=<?php echo $row["id"] ?>" class="btn btn-secondary"> EDIT</a>
                                        <a href="delete_task.php?id=<?php echo $row["id"] ?>" class="btn btn-danger"> DELITE</a>
                                    </td>
                                </tr>
                            <?php } ?>                       
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?> 


   