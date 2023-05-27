<?php
include("classes/Fruits.php");
$fruits = new Fruits();
$id = $_GET['id'];

     if(isset($_GET['id'])){
        $data = $fruits->edit($id);
        $row = mysqli_fetch_assoc($data);
     }
     if(isset($_POST['update'])){
        $fruits->update($_POST, $id);
     }
?>

<?php
include_once("include/header.php");
?>


<section>
    <div class="container">
        <div class="title text-center text-primary">
            <h4 class="display-2">update Fruits</h4>
        </div>
        <div class="col-md-8 offset-2">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
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
                </div>
                <div class="mb-3">
                    <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control"
                        placeholder="Enter Fruits Name" require>
                </div>
                <div class="mb-3">
                    <input type="number" name="enter_qty" value="<?php echo $row['enter_qty'];?>" class="form-control"
                        placeholder="Enter Quantity" require>
                </div>
                <div class="mb-3">
                    <!-- <input type="file" name="img" class="form-control" require> -->
                    <img src="upload/<?php echo $row['img']?>" alt="" width="60px" height="60px">

                    <input type="file" name="img" id="" class="form-control mt-3">

                    <input type="hidden" name="old__image" id="taskImage" class="form-control mt-3"
                        value="<?php echo $row['img'];?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="price" value="<?php echo $row['price'];?>" placeholder="Enter Price"
                        class="form-control" require>
                </div>
                <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</section>
<?php include_once("include/footer.php") ?>