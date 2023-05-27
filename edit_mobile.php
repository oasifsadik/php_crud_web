<?php
include("classes/Mobile.php");
$mobile = new Mobile();

$id = $_GET['id'];

     if(isset($_GET['id'])){
        $data = $mobile->edit($id);
        $row = mysqli_fetch_assoc($data);
     }
     if(isset($_POST['update_mobi'])){
        $mobile->update($_POST, $id);
     }
?>

<?php
include_once("include/header.php")
?>

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
                    <input type="text" name="mobile_name" value="<?php echo $row['mobile_name'];?>" class="form-control"
                        placeholder="Enter mobile Name" require>
                </div>
                <div class="mb-3">
                    <input type="number" name="enter_mobile_qty" value="<?php echo $row['enter_mobile_qty'];?>"
                        class="form-control" placeholder="Enter mobile Quantity" require>
                </div>
                <div class="mb-3">
                    <img src="upload/mobile<?php echo $row['mobile_img']?>" alt="" width="60px" height="60px">

                    <input type="file" name="mobile_img" id="" class="form-control mt-3">

                    <input type="hidden" name="old__image" id="taskImage" class="form-control mt-3"
                        value="<?php echo $row['mobile_img'];?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="mobile_price" value="<?php echo $row['mobile_price'];?>"
                        placeholder="Enter mobile Price" class="form-control" require>
                </div>
                <button type="submit" name="update_mobi" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</section>
<?php include_once("include/footer.php") ?>