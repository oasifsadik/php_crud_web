<?php
include("classes/Mobile.php");
$mobile = new Mobile();

if(isset($_POST['save'])){
    $mobile->Add($_POST);
}
?>

<?php
include_once("include/header.php")
?>

<section>
        <div class="container">
            <div class="title text-center text-primary">
                <h4 class="display-2">Mobile</h4>
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
                            $mobile = $mobile->show();
                            $s = 1;
                            while($all = mysqli_fetch_assoc($mobile) ){
                                ?>
                                <tr>
                                <td><?php echo $s++;?></td>
                                <td><?php echo $all['mobile_name'];?></td>
                                <td><?php echo $all['enter_mobile_qty'];?></td>
                                <td><img src="upload/<?php echo $all['mobile_img'];?>" width="100px;" height="80px" alt=""></td>
                                <td><?php echo $all['mobile_price'];?></td>
                                <td>
                                    <a href="edit_mobile.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-danger">Edit</a>
                                    <a href="delete_mobile.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-primary">Delete</a>
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
                <h4 class="display-2">Add Mobile</h4>
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
                    <input type="text" name="mobile_name" class="form-control" placeholder="Enter mobile Name" require>
                </div>
                <div class="mb-3">
                    <input type="number" name="enter_mobile_qty" class="form-control" placeholder="Enter mobile Quantity" require>
                </div>
                <div class="mb-3">
                    <input type="file" name="mobile_img" class="form-control" require>
                </div>
                <div class="mb-3">
                    <input type="text" name="mobile_price" placeholder="Enter mobile Price" class="form-control" require>
                </div>
                <button type="submit" name="save" class="btn btn-primary w-100">Submit</button>
            </form>
            </div>
        </div>
    </section>
<?php include_once("include/footer.php") ?>