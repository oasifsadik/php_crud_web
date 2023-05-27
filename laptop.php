<?php
include("classes/Laptop.php");
$laptop = new Laptop();

if(isset($_POST['save'])){
    $laptop->Add($_POST);
}
?>

<?php
include_once("include/header.php")
?>

<section>
        <div class="container">
            <div class="title text-center text-primary">
                <h4 class="display-2">Laptop</h4>
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
                            $laptop = $laptop->show();
                            $s = 1;
                            while($all = mysqli_fetch_assoc($laptop) ){
                                ?>
                                <tr>
                                <td><?php echo $s++;?></td>
                                <td><?php echo $all['laptop_name'];?></td>
                                <td><?php echo $all['enter_laptop_qty'];?></td>
                                <td><img src="upload/<?php echo $all['laptop_img'];?>" width="100px;" height="80px" alt=""></td>
                                <td><?php echo $all['laptop_price'];?></td>
                                <td>
                                    <a href="edit_laptop.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-danger">Edit</a>
                                    <a href="delete_laptop.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-primary">Delete</a>
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
                <h4 class="display-2">Add Laptop</h4>
            </div>
            <div class="col-md-8 offset-2">
                <!-- Display Message -->
                <?php 

                    if(isset($_SESSION['message'])){?>

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
                    <input type="text" name="laptop_name" class="form-control" placeholder="Enter mobile Name" require>
                </div>
                <div class="mb-3">
                    <input type="number" name="enter_laptop_qty" class="form-control" placeholder="Enter mobile Quantity" require>
                </div>
                <div class="mb-3">
                    <input type="file" name="laptop_img" class="form-control" require>
                </div>
                <div class="mb-3">
                    <input type="text" name="laptop_price" placeholder="Enter mobile Price" class="form-control" require>
                </div>
                <button type="submit" name="save" class="btn btn-primary w-100">Submit</button>
            </form>
            </div>
        </div>
    </section>
<?php include_once("include/footer.php") ?>