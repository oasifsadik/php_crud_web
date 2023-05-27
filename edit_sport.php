<?php
include("classes/Sport.php");
$sport = new Sport();

$id = $_GET['id'];
     if(isset($_GET['id']))
     {
        $data = $sport->edit($id);
        $row = mysqli_fetch_assoc($data);
     }
     if(isset($_POST['update_sp'])){
        $sport->update($_POST, $id);
     }
?>

<?php
include_once("include/header.php")
?>

<section>
    <div class="container">
        <div class="title text-center text-primary">
            <h4 class="display-2">Edit Sport</h4>
        </div>
        <div class="col-md-8 offset-2">
            <?php if(isset($_SESSION['message'])){?>
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
                    <input type="text" name="sport_name" value="<?php echo $row['sport_name'];?>" class="form-control"
                        placeholder="Enter Sport Name" require>
                </div>

                <div class="mb-3">
                    <input type="number" name="sport_qty" value="<?php echo $row['sport_qty'];?>"
                        class="form-control" placeholder="Enter Sport Quantity" require>
                </div>

                <div class="mb-3">
                    <img src="upload/<?php echo $row['sport_img']?>" alt="" width="60px" height="60px">
                    <input type="file" name="sport_img" id="" class="form-control mt-3">
                    <input type="hidden" name="old__image" id="taskImage" class="form-control mt-3"
                        value="<?php echo $row['sport_img'];?>">
                </div>

                <div class="mb-3">
                    <input type="text" name="sport_price" value="<?php echo $row['sport_price'];?>"
                        placeholder="Enter Sport Price" class="form-control" require>
                </div>
                
                <button type="submit" name="update_sp" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</section>
<?php include_once("include/footer.php") ?>