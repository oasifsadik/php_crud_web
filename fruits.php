<?php
include("classes/Fruits.php");
$task = new Fruits();

    if(isset($_POST['save']))
    {
        $task->store($_POST);
    }
?>

<?php
include_once("include/header.php")
?>

<section>
    <div class="container">
        <div class="title text-center text-primary">
            <h4 class="display-2">Fruits</h4>
        </div>
        <div class="col-md-8 offset-2">
            <table class="table border">
                <thead>
                    <tr>
                        <th>#sl</th>
                        <th>Fruits</th>
                        <th>Qty</th>
                        <th>Fruits Image</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $data = $task->Show();
                            $s = 1;
                            while($all = mysqli_fetch_assoc($data) ){
                                ?>
                    <tr>
                        <td><?php echo $s++;?></td>
                        <td><?php echo $all['name'];?></td>
                        <td><?php echo $all['enter_qty'];?></td>
                        <td><img src="upload/<?php echo $all['img'];?>" width="100px;" height="80px" alt=""></td>
                        <td><?php echo $all['price'];?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-danger">Edit</a>
                            <a href="delete.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-primary">Delete</a>
                        </td>
                    </tr>
                    <?php     
                     }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="title text-center text-primary">
            <h4 class="display-2">Add Fruits</h4>
        </div>
        <div class="col-md-8 offset-2">
                <?php 
                    if(isset($_SESSION['message'])){
                ?>
                    <div class="alert alert-<?php echo $_SESSION['type']?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message'];?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                    }
                ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter Fruits Name" require>
                </div>
                <div class="mb-3">
                    <input type="number" name="enter_qty" class="form-control" placeholder="Enter Quantity" require>
                </div>
                <div class="mb-3">
                    <input type="file" name="img" class="form-control" require>
                </div>
                <div class="mb-3">
                    <input type="text" name="price" placeholder="Enter Price" class="form-control" require>
                </div>
                <button type="submit" name="save" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</section>
<?php include_once("include/footer.php") ?>